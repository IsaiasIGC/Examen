<?php

$usuarios = [
    [
        "nombre" => "DC",
        "password" => 1234
    ],
    [
        "nombre" => "MARVEL",
        "password" => 1234
    ],
];

function autenticaUsuario($usuarios, $nombre, $contraseña) {
    foreach ($usuarios as $usuario) {
        if ($usuario["nombre"] == $nombre && $usuario["password"] == $contraseña) {
            return $usuario;
        }
    }

    return false;
}

if(isset($_POST['enviar'], $_POST['nombre'], $_POST['password'])) {

    $usuario = autenticaUsuario($usuarios, $_POST['nombre'], $_POST['password']);

    if($usuario != false) {
        header("Refresh:2; url=lista_superheroes.php");
        echo "Logeado con éxito";
    } else {
        header("Refresh:2; url=login.php");
        echo "No se ha podido iniciar sesión: datos incorrectos";
    }
}

?>