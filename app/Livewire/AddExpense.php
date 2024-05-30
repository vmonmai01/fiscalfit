<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\ExpenseCategory;
use App\Models\Notification;

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
        'description' => 'required|string|max:255',
        'date' => 'required|date',
        'expense_category_id' => 'required|exists:expense_categories,id',
        'recurringPeriod' => 'in:none,daily,weekly,biweekly,monthly,bimonthly,quarterly,semiannually,annually',
        'photo' => 'nullable|image|max:2024',
    ];

    protected $messages = [
        'amount.required' => 'El campo de importe es obligatorio.',
        'amount.numeric' => 'El campo de importe debe ser numérico.',
        'amount.min' => 'El campo de importe debe ser superior a :min.',
        'description.string' => 'El campo descripción debe ser un texto.',
        'description.max' => 'El campo descripción no debe superar :max caracteres.',
        'date.required' => 'El campo fecha es obligatorio.',
        'date.date' => 'El campo fecha debe tener una fecha válida.',
        'expense_category_id.required' => 'Debes seleccionar una categoría.',
        'expense_category_id.exists' => 'La categoría seleccionada no es válida.',
        'recurringPeriod.in' => 'La periodicidad seleccionada no es válida.',
        'photo.image' => 'El archivo debe ser una imagen.',
        'photo.max' => 'El tamaño máximo permitido para el archivo adjunto es :max kilobytes.',
    ];

    public function submit()
    {
        $this->validate();

        $photoName = NULL;
        $limit = 40; // Cantidad que marca el corte para enviar o no notificaciones, si es > se envía. 

        // Verificar si se ha proporcionado una foto
        if ($this->photo) {
            // Generar un nombre único para la foto combinando el tiempo actual y el nombre original del archivo
            $photoName = time() . '-' . $this->photo->getClientOriginalName();

            // Almacenar la foto en el servidor con el nombre único generado
            $this->photo->storeAs('expenses_photos', $photoName, 'public');
        }

        // Crear el gasto en la base de datos
        $expense = Expense::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'date' => $this->date,
            'recurring_period' => $this->recurringPeriod,
            'photo' => $photoName,
            'expense_category_id' => $this->expense_category_id
        ]);
        // Calculamos la fecha de envío de la notificación (3 días antes de la fecha efectiva del gasto).
        $notificationDate = \Carbon\Carbon::parse($this->date)->subDays(3);
        // Crear notificación si el gasto es mayor que 40.00
        if ($expense->amount > $limit) {
            Notification::create([
                'user_id' => auth()->user()->id,
                'message' => 'Tienes un gasto pendiente en los proximos días de más de ' . $expense->amount . '€, con fecha: ' . $expense->date . '. Detalles: ' . $expense->description,
                'expense_id' => $expense->id,
                'send_at' => $notificationDate, // Enviar notificación 3 días después de la creación del gasto
                'read' => false,
            ]);
        }
        // Si el gasto tiene una periodicidad, crear copias del gasto para las fechas correspondientes
        if ($this->recurringPeriod !== 'none') {
            // Obtener las fechas futuras basadas en la periodicidad
            $futureDates = $this->calculateFutureDates($this->date, $this->recurringPeriod);

            // Crear copias del gasto para las fechas futuras
            foreach ($futureDates as $futureDate) {

                // Crear gasto para cada instancia recurrente
                $newExpense = Expense::create([
                    'user_id' => auth()->user()->id,
                    'amount' => $this->amount,
                    'description' => $this->description,
                    'date' => $futureDate,
                    'recurring_period' => 'none', // No queremos que estas copias sean recurrentes
                    'photo' => null, // Utilizar la misma foto para todas las copias
                    'expense_category_id' => $this->expense_category_id
                ]);

                // Crear notificación para cada instancia recurrente
                if ($newExpense->amount > $limit) {
                    // Calculamos la fecha de envío de la notificación (3 días antes de la fecha efectiva del gasto recurrente).
                    $notificationDate = \Carbon\Carbon::parse($futureDate)->subDays(3);

                    Notification::create([
                        'user_id' => auth()->user()->id,
                        'message' => 'Tienes un gasto recurrente pendiente en los próximos días de más de ' . $newExpense->amount . '€, con fecha: ' . $futureDate . '. Detalles: ' . $this->description,
                        'expense_id' => $newExpense->id, // Usar el ID del gasto recién creado
                        'send_at' => $notificationDate, // Enviar notificación 3 días antes de la fecha del gasto recurrente
                        'read' => false,
                    ]);
                }
            }
        }

        // Redireccionar
        return redirect()->to('/expenses');
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
        $categories = ExpenseCategory::all(); // Obtenemos todas las categorías de ingreso para mostrar un radioButton
        return view('livewire.add-expense', ['categories' => $categories]);
    }
}
