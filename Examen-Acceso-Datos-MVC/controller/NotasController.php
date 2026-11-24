<?php
// VideojuegoController.php
require_once "modelos/NotasModel.php";
class NotasController {
    private $modelo;
    public function __construct() {
        $this->modelo = new VideojuegoModel();
    }

    public function index() {
        $mensaje = "";
        // Si el usuario envió el formulario para añadir una nota...
        // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
        //     $nombre = $_POST['nombre'];
        //     $genero = $_POST['genero'];
        //     $precio = $_POST['precio'];
        //     $exito = $this->modelo->insertar($nombre, $genero, $precio);
        //     $mensaje = $exito ? "¡Videojuego guardado con éxito!" : "Error al guardar el videojuego.";
        // }

        

        if (isset($_GET['buscar'])) {
            $id = $_GET['id'];
            $alumnoEncontrado = $this->modelo->obtenerAlumno($id);
            if (!$alumnoEncontrado) {
                $mensaje = "No se ha encontrado el equipo.";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
            $id = $_POST['id'];
            $nota = $_POST['nota'];
            $exito = $this->modelo->updateNota($id, $nota);
            $mensaje = $exito ? "!Estado actualizado con éxito!" : "No se pudo actualizar el estado del equipo.";
        }

        // El controlador le pide la lista de notas al modelo
        $notas = $this->modelo->obtenerTodos();

        require_once "vista/Notas_View.php";
    }
}
