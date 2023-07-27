<?php
require_once './controllers/productoAdmin.controllers.php';
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$libros = ProductoControlles::getLibros();
$selec = ProductoControlles::selectLibros();
$mostrarBotonAgregar = ($accion !== "Seleccionar");

# Developed by MiguelAngel
?>
<div class="col-md-5">
    <div class="card">
        <div class="card-header bg-success-subtle">
            Datos del Libro
        </div>
        <div class="card-body">

            <!-- Mensaje de error -->
            <?php if (isset($mensaje)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                    <label for="id">Clave:</label>
                    <input type="text" required readonly value="<?php echo isset($selec['id']) ? $selec['id'] : ''; ?>" class="form-control" name="id" id="id" placeholder="Clave del producto">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" value="<?php echo isset($selec['nombre']) ? $selec['nombre'] : ''; ?>" name="nombre" id="nombre" placeholder="Nombre del libro">
                </div>
                <div class="form-group">
                    <label for="nombre">Imagen:</label>
                    <br>
                    <?php if (!empty($selec['imagen'])) { ?>
                        <img class="img-thumbnail rounded" src="views/img/<?php echo isset($selec['imagen']) ? $selec['imagen'] : ''; ?>" width="70" alt="">
                    <?php } ?>
                    <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen">
                </div>
                <div class="btn-group" role="group" aria-label="">
                    <?php if ($mostrarBotonAgregar) { ?>
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <?php } ?>
                    <?php if ($accion == "Seleccionar") { ?>
                        <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                        <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-7">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro) { ?>
                <tr>
                    <td scope="row"><?php echo $libro['id']; ?></td>
                    <td><?php echo $libro['nombre']; ?></td>
                    <td>
                        <img class="img-thumbnail rounded" src="views/img/<?php echo $libro["imagen"]; ?>" width="70" alt="">
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo $libro['id']; ?>">
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>