<?php
require_once 'conexion.php';

class ProductoModels
{

    public static function addProductos($nombre, $image)
    {
        global $conexion;
        $sentenciaSQL = $conexion->prepare("INSERT INTO libros (nombre,imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre', $nombre);

        $fecha = new DateTime();
        $nombreArchivo = ($image != "") ? $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "imagen.jpg";
        $tmpImagen = $_FILES["imagen"]["tmp_name"];
        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "views/img/" . $nombreArchivo);
        }
        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();
        $sentenciaSQL=null;
        $conexion=null;
        $_SESSION['mensaje'] = "El producto se agregó correctamente.";
        header("Location:" . SERVER_URL . "productosAdmin");
    }

    public static function getLibros()
    {
        global $conexion;
        $sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
        $sentenciaSQL->execute();
        $listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        return $listaLibros;
    }

    public static function selectLibros($id)
    {
        global $conexion;
        $sentenciaSQL = $conexion->prepare("SELECT * FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $id);
        $sentenciaSQL->execute();
        $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        return $libro;
    }

    public static function editProductos($id, $nombre, $image)
    {
        global $conexion;
        $sentenciaSQL = $conexion->prepare("UPDATE libros SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre', $nombre);
        $sentenciaSQL->bindParam(':id', $id);
        $sentenciaSQL->execute();
        if (!empty($image)) {
            $fecha = new DateTime();
            $nombreArchivo = ($image != "") ? $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "imagen.jpg";
            $tmpImagen = $_FILES["imagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "views/img/" . $nombreArchivo);

            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
            $sentenciaSQL->bindParam(':id', $id);
            $sentenciaSQL->execute();
            $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($libro["imagen"]) && ($libro["imagen"] != "imagen.jpg")) {
                if (file_exists("views/img/" . $libro["imagen"])) {
                    unlink("views/img/" . $libro["imagen"]);
                }
            }

            $sentenciaSQL = $conexion->prepare("UPDATE libros SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $id);
            $sentenciaSQL->execute();
        }
        
        header("Location:" . SERVER_URL . "productosAdmin");       
    }

    public static function deleteProductos($id)
    {
        global $conexion;
        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $id);
        $sentenciaSQL->execute();
        $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($libro["imagen"]) && ($libro["imagen"] != "imagen.jpg")) {
            if (file_exists("views/img/" . $libro["imagen"])) {
                unlink("views/img/" . $libro["imagen"]);
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $id);
        $sentenciaSQL->execute();
        header("Location:" . SERVER_URL . "productosAdmin"); 
    }
}
