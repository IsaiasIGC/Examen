<?php
// VideojuegoModel.php
require_once "config/db.php";
class VideojuegoModel {
    private $conexion;
    public function __construct() {
        // Obtenemos la conexión desde tu archivo db.php
        $this->conexion = obtenerConexion();
    }

    public function updateNota($id, $nota) {
        try {
            $sql = "UPDATE notas SET profesor1=:profesor1 WHERE id=:id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':profesor1', $nota);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerTodos() {
        try {
            $sql = "SELECT * FROM notas";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function obtenerAlumno($id) {
        try {
            $sql = "SELECT * FROM notas WHERE id=:id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
