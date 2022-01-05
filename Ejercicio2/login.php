<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Login</title>
</head>
<?php session_unset(); ?>
<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form" method="post" id="createForm">
                <div id="messageCreate"></div>
                <input type="text" placeholder="Username" id="newUsername" name="usernameNew"required/>
                <input type="text" placeholder="Nombre" id="name" name="nombreNew" required/>
                <input type="text" placeholder="Apellido" id="lastname" name="apellidoNew" required/>
                <input type="password" placeholder="Password" id="newPassword" name="passwordNew" required/>
                <button type="submit">Crear</button>
                <p class="message1">¿Ya estas registrado? <a href="#">Ingresa aqui</a></p>
            </form>
            <h1 id="title">Login</h1>
            <form class="login-form" method="post" id="form">
                <input type="text" placeholder="Username" id="username" name="username" required />
                <input type="password" placeholder="Password" id="password" name="password" required />
                <button type="submit">Ingresar</button>
                <p class="message2">¿No estas registrado? <a href="#">Crea un usuario</a></p>
            </form>
            <div id="alert"></div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/login.js"></script>
</body>

</html>