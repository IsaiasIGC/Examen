<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// index.php
require_once "controller/NotasController.php";
// Instanciamos el controlador y ejecutamos su acción principal
$controlador = new NotasController();
$controlador->index();
