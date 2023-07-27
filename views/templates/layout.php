<?php  
    # Developed by MiguelAngel
    if(isset($_GET['ruta'])){
        
        $ruta = $_GET['ruta'];
        
        if(
            $ruta == "main" ||
            $ruta == "libros" ||
            $ruta == "nosotros"
        ){
            include "header.php";
            include "views/modules/{$ruta}.php";
            include "footer.php";
        }
        
        else if($ruta == "loginAdmin" || $ruta == "cerrarSesion"){
            include "views/modules/{$ruta}.php";
        }
        
        else if($ruta == "inicioAdmin" || $ruta == "productosAdmin"){
            include "headerAdmin.php";
            include "views/modules/{$ruta}.php";
            include "footerAdmin.php";
        }
        
        else{
            include "views/modules/404.php";
        }
    }else{
        include "header.php";
        include "views/modules/main.php";
        include "footer.php";
    }
?>