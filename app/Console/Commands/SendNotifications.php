<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Notification;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class SendNotifications extends Command
{
    
    protected $signature = 'send:notifications';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        // Mensaje informativo
        // $this->info('El comando send:notifications está siendo ejecutado...');
        $this->info('Se han enviado los correos de notificación de gasto');
        
        // Obtener las notificaciones pendientes para hoy
        $notifications = Notification::whereDate('send_at', today())->get();

        // Enviar correos electrónicos para cada notificación
        foreach ($notifications as $notification) {
            // Envía el correo electrónico utilizando la clase NotificationMail
            Mail::to($notification->user->email)->send(new NotificationMail(
                $notification->expense->description,
                $notification->expense->date,
                $notification->expense->amount,
                $notification->user
            ));

            // Marcar la notificación como enviada, No está contemplado en la BBDD -> modificar al crear la migración y añadir en el resto de pasos
            // $notification->update(['sent' => true]);
        }
    }
}
