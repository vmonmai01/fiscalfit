<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Income;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\IncomeCategory;

class AddIncome extends Component
{
    use WithFileUploads;

    public $amount;
    public $description;
    public $date;
    public $recurringPeriod = 'none';

    public $income_category_id;
    public $photo;

    protected $rules = [
        'amount' => 'required|numeric|min:0',
        'description' => 'nullable|string|max:255',
        'date' => 'required|date',
        'income_category_id' => 'required|exists:income_categories,id',
        'recurringPeriod' => 'in:none,daily,weekly,biweekly,monthly,bimonthly,quarterly,semiannually,annually',
        'photo' => 'nullable|image|max:2024',
    ];

    protected $messages = [
        'amount.required' => 'El campo de importe es obligatorio.',
        'amount.numeric' => 'El campo de importe debe ser numérico.',
        'amount.min' => 'El campo de importe debe ser superior a :min.',
        'description.string' => 'El campo descripción debe ser un texto',
        'description.max' => 'El campo descripción no debe superar :max caracteres.',
        'date.required' => 'El campo fecha es obligatorio.',
        'date.date' => 'El campo fecha debe tener una fecha válida.',
        'income_category_id.required' => 'Debes seleccionar una categoría.',
        'income_category_id.exists' => 'La categoría seleccionada no es válida.',
        'recurringPeriod.in' => 'La periodicidad seleccionada no es válida.',
        'photo.image' => 'El archivo debe ser una imagen.',
        'photo.max' => 'El tamaño máximo permitido para el archivo adjunto es :max kilobytes.',
    ];

    public function submit()
    {
        $this->validate();

        $photoName = NULL;

        // Verificar si se ha proporcionado una foto
        if ($this->photo) {
            // Generar un nombre único para la foto combinando el tiempo actual y el nombre original del archivo
            $photoName = time() . '-' . $this->photo->getClientOriginalName();

            // Almacenar la foto en el servidor con el nombre único generado
            $this->photo->storeAs('incomes_photos', $photoName, 'public');
        }

        // Crear el ingreso en la base de datos
        Income::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'date' => $this->date,
            'recurring_period' => $this->recurringPeriod,
            'photo' => $photoName,
            'income_category_id' => $this->income_category_id
        ]);


        // Si el ingreso tiene una periodicidad, crear copias del ingreso para las fechas correspondientes
        if ($this->recurringPeriod !== 'none') {
            // Obtener las fechas futuras basadas en la periodicidad
            $futureDates = $this->calculateFutureDates($this->date, $this->recurringPeriod);

            // Crear copias del ingreso para las fechas futuras
            foreach ($futureDates as $futureDate) {
                Income::create([
                    'user_id' => auth()->user()->id,
                    'amount' => $this->amount,
                    'description' => $this->description,
                    'date' => $futureDate,
                    'recurring_period' => 'none', // No queremos que estas copias sean recurrentes
                    'photo' => 'null', // Utilizar la misma foto para todas las copias
                    'income_category_id' => $this->income_category_id
                ]);
            }
        }

        // Redireccionar
        return redirect()->to('/incomes');
    }

    // Método para calcular las fechas futuras basadas en la periodicidad
    private function calculateFutureDates($startDate, $recurringPeriod)
    {
        // Lógica para calcular las fechas futuras según la periodicidad

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

                $currentDate->addMonths(6);
                $futureDates[] = $currentDate->toDateString();

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
        $categories = IncomeCategory::all(); // Obtenemos todas las categorías de ingreso para mostrar un radioButton
        return view('livewire.add-income', ['categories' => $categories]);
    }
}
