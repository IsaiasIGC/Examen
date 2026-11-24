<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
</head>
<body>
    <h1>Acceso</h1>
    <form action="controller/acceso_controller.php" method="POST">
        <article>
            <label for="nombre">Nombre de usuario</label>
            <input type="text" name="nombre" id="nombre" required>
        </article>

        <article>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
        </article>

        <button type="submit" name="acceder">Acceder</button>
    </form>
</body>
</html>