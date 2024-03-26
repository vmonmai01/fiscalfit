<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\ExpenseCategory;

class AddExpense extends Component
{

    use WithFileUploads;

    public $amount;
    public $description;
    public $date;
    public $recurringPeriod = 'none';

    public $expense_category_id;
    public $photo;

    protected $rules = [
        'amount' => 'required|numeric|min:0',
        'description' => 'nullable|string|max:255',
        'date' => 'required|date',
        'expense_category_id' => 'required|exists:expense_categories,id',
        'recurringPeriod' => 'in:none,daily,weekly,biweekly,monthly,bimonthly,quarterly,semiannually,annually',
        'photo' => 'nullable|image|max:2024',
    ];

    protected $messages = [
        'amount.required' => 'The amount field is required.',
        'amount.numeric' => 'The amount field must be a numeric value.',
        'amount.min' => 'The amount field must be at least :min.',
        'description.string' => 'The description field must be a string.',
        'description.max' => 'The description field must not exceed :max characters.',
        'date.required' => 'The date field is required.',
        'date.date' => 'The date field must be a valid date.',
        'expense_category_id.required' => 'You must select an expense category.',
        'expense_category_id.exists' => 'The selected expense category is invalid.',
        'recurringPeriod.in' => 'The recurring period must be none, daily, weekly, biweekly, monthly, bimonthly, quarterly, semiannually, or annually.',
        'photo.image' => 'The attached file must be an image.',
        'photo.max' => 'The maximum allowed size for the attached file is :max kilobytes.',
    ];

    public function submit()
    {
        $this->validate();

        $photoName = null;

        // Verificar si se ha proporcionado una foto
        if ($this->photo) {
            // Generar un nombre único para la foto combinando el tiempo actual y el nombre original del archivo
            $photoName = time() . '-' . $this->photo->getClientOriginalName();

            // Almacenar la foto en el servidor con el nombre único generado
            $this->photo->storeAs('expenses_photos', $photoName, 'public');
        }

        // Crear el gasto en la base de datos
        Expense::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'date' => $this->date,
            'recurring_period' => $this->recurringPeriod,
            'photo_path' => $photoName,
            'expense_category_id' => $this->expense_category_id
        ]);


        // Si el gasto tiene una periodicidad, crear copias del gasto para las fechas correspondientes
        if ($this->recurringPeriod !== 'none') {
            // Obtener las fechas futuras basadas en la periodicidad
            $futureDates = $this->calculateFutureDates($this->date, $this->recurringPeriod);

            // Crear copias del gasto para las fechas futuras
            foreach ($futureDates as $futureDate) {
                Expense::create([
                    'user_id' => auth()->user()->id,
                    'amount' => $this->amount,
                    'description' => $this->description,
                    'date' => $futureDate,
                    'recurring_period' => 'none', // No queremos que estas copias sean recurrentes
                    'photo_path' => 'null', // Utilizar la misma foto para todas las copias
                    'expense_category_id' => $this->expense_category_id
                ]);
            }
        }

        // Redireccionar
        return redirect()->to('/dashboard');
    }

    // Método para calcular las fechas futuras basadas en la periodicidad
    private function calculateFutureDates($startDate, $recurringPeriod)
    {
        // Usamos Carbon para calcular las fechas futuras
        $futureDates = [];
        $currentDate = \Carbon\Carbon::parse($startDate);

        // Agregar fechas futuras basadas en la periodicidad
        switch ($recurringPeriod) {
                //diario
            case 'daily':
                // Agregar 30 días para calcular una fecha futura
                for ($i = 1; $i <= 365; $i++) {
                    $currentDate->addDays(1);
                    $futureDates[] = $currentDate->toDateString();
                }
                break;
                //semanal 
            case 'weekly':
                // Agregar 52 semanas para calcular fechas futuras durante un año
                for ($i = 1; $i <= 52; $i++) {
                    $currentDate->addWeek();
                    $futureDates[] = $currentDate->toDateString();
                }
                break;
                // Bisemanal
            case 'biweekly':
                // Agregar 26 períodos de dos semanas para calcular fechas futuras durante un año
                for ($i = 1; $i <= 26; $i++) {
                    $currentDate->addWeeks(2);
                    $futureDates[] = $currentDate->toDateString();
                }
                break;
                // Mensual
            case 'monthly':
                // Agregar 12 meses para calcular fechas futuras durante un año
                for ($i = 1; $i <= 12; $i++) {
                    $currentDate->addMonths(1);
                    $futureDates[] = $currentDate->toDateString();
                }
                break;
                // Bimensual
            case 'bimonthly':
                // Agregar 6 meses para calcular fechas futuras durante un año
                for ($i = 1; $i <= 6; $i++) {
                    $currentDate->addMonths(2);
                    $futureDates[] = $currentDate->toDateString();
                }
                break;

                // Trimestral
            case 'quarterly':
                // Agregar 3 meses por trimestre, para calcular fechas futuras durante un año
                for ($i = 1; $i <= 4; $i++) {
                    $currentDate->addMonths(3);
                    $futureDates[] = $currentDate->toDateString();
                }
                break;

                //Semianual
            case 'semiannually':
                // Agregar 6 meses por semestre, para calcular fechas futuras durante un año
                for ($i = 1; $i <= 2; $i++) {
                    $currentDate->addMonths(6);
                    $futureDates[] = $currentDate->toDateString();
                }
                break;

                // Anual
            case 'annually':
                // Agregar 1 año para calcular fechas futuras
                $currentDate->addYear();
                $futureDates[] = $currentDate->toDateString();
                break;
        }

        return $futureDates;
    }


    public function render()
    {
        $categories = ExpenseCategory::all(); // Obtenemos todas las categorías de ingreso para mostrar un radioButton
        return view('livewire.add-expense', ['categories' => $categories]);
    }
}
