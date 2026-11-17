<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        
    </main>
    <h2>Iniciar sesión</h2>
    <form action="valida_login.php" method="POST">
        <article>
            <label for="nombre">Nombre de usuario</label>
            <input type="text" name="nombre" id="nombre">
        </article>
        <article>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
        </article>
        <button type="submit" name="enviar">Iniciar sesión</button>
    </form>
</body>
</html>