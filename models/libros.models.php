<?php
    require_once 'conexion.php';
    
    class Modelslibros{
        public static function getLibros(){
            global $conexion;
            $sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
            $sentenciaSQL->execute();
            $listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            return $listaLibros;
        }
    }
?>