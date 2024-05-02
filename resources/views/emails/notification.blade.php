<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification de Gasto</title>
</head>
<body>
    <h1>Notificación de Gasto</h1>
    
    <h2> Hola {{$user }}, tiene un gasto proximamente. </h2>
    <p>Detalles del gasto:</p>
    <ul>
        <li><strong>Descripción:</strong> {{ $expenseDescription }}</li>
        <li><strong>Fecha:</strong> {{ $expenseDate }}</li>
        <li><strong>Monto:</strong> {{ $expenseAmount }}</li>
    </ul>
    
    <p>¡Gracias por usar nuestra aplicación!</p>
</body>
</html>