<?php

session_start();

$fichero = "heroes.csv";
$heroes = [];

if(file_exists($fichero)) {
    if (!$fp = fopen($fichero, "r")) {
        echo "No se ha podido abrir el fichero";
    } else {
        while (!feof($fp)) {
            $linea = trim(fgets($fp));
            if ($linea != "") {
                $heroe = explode(";", $linea);
                $heroes[] = $heroe;
            }
        }
        fclose($fp);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhéroes</title>
</head>
<body>
    <header><h1>Listado de Superhéroes</h1></header>
    <main>
        
    </main>
</body>
</html>