<?php

session_start();

$usuarios = [
    ["nombre" => "admin", "password" => "1234"],
    ["nombre" => "profesor1", "password" => "1234"],
    ["nombre" => "profesor2", "password" => "1234"],
    ["nombre" => "profesor3", "password" => "1234"],
    ["nombre" => "profesor4", "password" => "1234"]
];

function autenticaUsuario($usuarios, $nombre, $password) {
    foreach ($usuarios as $usuario) {
        if ($usuario["nombre"] == $nombre && $usuario["password"] == $password) {
            return $usuario;
        }
    }

    return false;
}

if (isset($_POST['acceder'])) {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $usuario = autenticaUsuario($usuarios, $nombre, $password);

    if ($usuario != false) {
        $_SESSION['username'] = $usuario["nombre"];
        header("Location:Notas_view.php");
    } else {
        echo "Error al intentar acceder";
    }
}

?>