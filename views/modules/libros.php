<?php 
    # Developed by MiguelAngel
    require_once 'controllers/libros.controllers.php';
    
    $listaLibros = ControllersUsuarios::getLibros();
    foreach($listaLibros as $libro){
?>
    <div class="col-md-3">
        <br>
        <div class="card">
            <div class="aspect-ratio">
                <img class="img-fluid" src="views/img/<?php echo $libro['imagen']; ?>">
            </div>
            <div class="card-body">
                <h4 class="card-title"><?php echo $libro['nombre']; ?></h4>
                <a name="" id="" class="btn bg-success text-white" href="https://goalkicker.com" role="button">Ver más</a>
            </div>
        </div>
        <br>
    </div>
    <?php } ?>