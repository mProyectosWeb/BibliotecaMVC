<?php
require_once "./models/productoAdmin.models.php";
if (isset($_POST['accion'])) {

    $producto = new ProductoControlles;

    switch ($_POST['accion']) {
        case 'Agregar':
            if (empty(trim($_POST['nombre']))) {
                $mensaje = "Los campos no deben de estar vacios";
            } else {
                $resultado = $producto->addProductos();
            }
            break;
        case 'Seleccionar':
            $resultado = $producto->selectLibros();
            break;
        case 'Modificar':
            if (empty(trim($_POST['nombre']))) {
                $mensaje = "Los campos no deben de estar vacios";
            } else {
                $resultado = $producto->editProductos();
            }
            break;
        case 'Borrar':
            if (empty(trim($_POST['id']))) {
                $mensaje = "Los campos no deben de estar vacios";
            } else {
                $producto->deleteProductos();
            }
            break;
        case 'Cancelar':
            header("Location:" . SERVER_URL . "productosAdmin"); 
            break;
        default:
            // Lógica para otros casos (opcional)
            break;
    }
}

class ProductoControlles
{

    public static function addProductos()
    {
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
        $image = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
        $resultado = ProductoModels::addProductos($nombre, $image);
        return $resultado;
    }

    public static function getLibros()
    {
        return ProductoModels::getLibros();
    }

    public static function selectLibros()
    {
        $id = (isset($_POST['id'])) ? $_POST['id'] : "";
        $resultado = ProductoModels::selectLibros($id);
        return $resultado;
    }

    public static function editProductos()
    {
        $id = (isset($_POST['id'])) ? $_POST['id'] : "";
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
        $image = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
        $resultado = ProductoModels::editProductos($id,$nombre,$image);
        return $resultado;
    }
    public static function deleteProductos()
    {
        $id = (isset($_POST['id'])) ? $_POST['id'] : "";
        $resultado = ProductoModels::deleteProductos($id);
        return $resultado;
    }
}
