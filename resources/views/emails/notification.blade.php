<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Gasto</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f3eeee; margin: 0; padding: 20px;">

    <div
        style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

        <div style="display: flex; align-items: center;">
            <h1 style="color: #333333; margin-start: 20px;">FiscalFit</h1>
            <?php
            $imagePath = public_path('storage/fiscalfit/logo.jpg');
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageBase64 = 'data:image/png;base64,' . $imageData;
            ?>
            <img src="{{ $imageBase64 }}" alt="logo FiscalFit" style="max-width: 150px; height: auto; margin-left: auto;">
        </div>

        <h1 style="text-align: center; color: #333333;">Notificación de Gasto</h1>

        <h2 style="color: #555555;">Hola {{ $user->name }} {{ $user->lastname }}, tienes un gasto próximamente.</h2>
        <div style="text-align: right;">
            <div style="text-align: center;">
                <?php
                $imagePath = public_path('storage/user_avatar/UserProfile.jpg');
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageBase64 = 'data:image/png;base64,' . $imageData;
                ?>
                <img src="{{ $imageBase64 }}" alt="Avatar de {{ $user->name }}"
                    style="border-radius: 50%; width: 100px; height: 100px;">
            </div>
        </div>


        <p style="text-align: center; color: #333333; font-size: 22px; font-weight: bold;">Detalles del gasto</p>
        <ul style="color: #333333; list-style-type: none; padding: 0;">
            <li style="margin-right: 10px; padding: 15px 0;"><strong>Descripción:</strong> {{ $expenseDescription }}
            </li>
            <li style="margin-right: 10px; padding: 15px 0;"><strong>Categoría:</strong> {{ $expenseCategory }}</li>
            <li style="margin-right: 10px; padding: 15px 0;"><strong>Fecha:</strong> {{ $expenseDate }}</li>
            <li style="margin-right: 10px; padding: 15px 0;"><strong>Monto:</strong> {{ $expenseAmount }}</li>
            @if (isset($expenseImg))
                <div style="text-align: center;">
                    <?php   
                    $imagePath = public_path('storage/expenses_photos/' . $expenseImg);
                    if(file_exists($imagePath)) {
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $imageBase64 = 'data:image/png;base64,' . $imageData;
                ?>
                    <img src="{{ $imageBase64 }}" alt="Imagen del gasto" style="max-width: 100%; height: auto;">
                    <?php
                    }
                ?>
                </div>
            @endif

        </ul>

        <p style="text-align: center; color: #555555;">¡Gracias por usar FiscalFit!</p>
    </div>

</body>

</html>
