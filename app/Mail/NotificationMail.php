<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    // Variables públicas para pasar datos al correo de notificación
    public $expenseDescription;
    public $expenseDate;
    public $expenseAmount;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($expenseDescription, $expenseDate, $expenseAmount, $user)
    {
        //
        $this->expenseDescription = $expenseDescription;
        $this->expenseDate = $expenseDate;
        $this->expenseAmount = $expenseAmount;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notification')
                    ->subject('Notificación de Gasto') // Asunto del correo
                    ->with([
                        'expenseDescription' => $this->expenseDescription,
                        'expenseAmount' => $this->expenseAmount,
                        'expenseDate' => $this->expenseDate,
                        'user' => $this->user
                    ]);
    }
}
