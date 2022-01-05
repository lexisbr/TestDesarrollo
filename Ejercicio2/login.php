<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Login</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <h1>Login</h1>
            <form class="login-form" method="post" id="form">
                <input type="text" placeholder="Username" id="username" name="username" required/>
                <input type="password" placeholder="Password" id="password" name="password" required/>
                <button type="submit">Ingresar</button>
            </form>
            <div id="alert"></div>
        </div>
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>