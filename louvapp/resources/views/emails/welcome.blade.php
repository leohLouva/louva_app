<!-- resources/views/emails/welcome.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido, {{ $user->name }} {{ $user->lastName }}!</h1>
    
    <p>Gracias por registrarte en nuestro sitio. Esperamos que disfrutes de nuestros servicios.</p>

    <p>Saludos,</p>
    <p>Tu Equipo de Soporte</p>
</body>
</html>
