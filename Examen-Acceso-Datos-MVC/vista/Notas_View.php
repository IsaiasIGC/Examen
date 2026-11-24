<!-- videojuego_view.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de notas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Listado de notas</h1>
    <!-- Si el controlador nos envía un mensaje, lo mostramos -->
    <?php if (!empty($mensaje)): ?>
        <div class="alerta"><?php echo htmlspecialchars($mensaje); ?></div>
    <?php endif; ?>

    <!-- Tabla que lista los notas que nos mandó el controlador -->
    <h2>Listado Actual</h2>
    <?php if (!empty($notas)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notas as $alumno): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($alumno['id'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($alumno['nombre']);?></td>
                        <td><?php echo htmlspecialchars($alumno['apellido1']);?></td>
                        <td><?php echo htmlspecialchars($alumno['apellido2']);?> €</td>
                        <td><?php echo htmlspecialchars($alumno['profesor1']);?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay notas registrados en el sistema.</p>
    <?php endif; ?>

    <!-- Buscar alumno para modificar su nota -->
    <section>
        <h2>Modificar nota de un alumno</h2>

        <?php if (!empty($notas)) { ?>
            <form class="formulario" action="index.php" method="GET">
                <article class="campo">
                    <label for="id_buscar">Selecciona el alumno:</label>
                    <select name="id" id="id_buscar" required>
                        <?php foreach ($notas as $alumno) { ?>
                            <option value="<?php echo htmlspecialchars($alumno["id"]); ?>">
                                <?php echo htmlspecialchars($alumno["nombre"]); ?>
                            </option>
                        <?php } ?>
                    </select>
                </article>
                <button class="boton" type="submit" name="buscar">Buscar alumno</button>
            </form>

        <?php } else { ?>
            <div class="alerta">No hay alumnos para modificar notas.</div>
        <?php } ?>

        <!-- Mostrar alumno seleccionado -->
        <?php if (!empty($alumnoEncontrado)) { ?>

            <h3>Alumno seleccionado</h3>

            <form class="formulario" action="index.php" method="POST">

                <article class="campo">
                    <h3>Nombre:</h3>
                    <p><?php echo htmlspecialchars($alumnoEncontrado["nombre"]); ?></p>
                </article>

                <article class="campo">
                    <h3>Apellido:</h3>
                    <p><?php echo htmlspecialchars($alumnoEncontrado["apellido1"]. " " .$alumnoEncontrado["apellido2"]); ?></p>
                </article>
                <article>
                    <h3>Nota actual:</h3>
                    <p>Nota actual: <?php echo htmlspecialchars($alumnoEncontrado["profesor1"]); ?></p>
                </article>
                <article class="campo">
                    <label for="nota_nueva">Introduce la nota</label>
                    <input type="number" name="nota" id="nota_nueva" step="0.01" max="10" required>
                </article>
                <input type="hidden" name="id"
                       value="<?php echo htmlspecialchars($alumnoEncontrado["id"]); ?>">
                <button class="boton" type="submit" name="actualizar">Actualizar nota</button>
            </form>
        <?php } ?>

    </section>
</body>

</html>