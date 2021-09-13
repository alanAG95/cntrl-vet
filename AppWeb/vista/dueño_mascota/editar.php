<?php if ($_SESSION['usuario']['usuario'] == 'Veterinario') {
  header('Location: http://localhost:82/AppWeb/index.php?modulo=usuario&accion=principal');
  echo "funciono";
} ?>
<?php
    if ($_GET['id_dueño_mascota']) {
        $dueño_mascota = $dueño_mascotaNegocio->recuperar($_GET['id_dueño_mascota']);
        $txtAction = 'Editar';
        $db_dire = new direcciónDb();//para listar las fonarea y que se vean en pantalla los datos importantes
        $dire = new dirección();//para listar las fonarea
        $dire = $db_dire->getDato($dueño_mascota->getId_dirección());
        $dueño_mascota->setId_dirección($dire->getDirección());
    }else{
        $dueño_mascota = new dueño_mascota();
        $txtAction = 'Agregar';
    }
    ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Dueño mascota</h1>
      </div>
        <form role="form" method="post" id="principal">
            <input type="hidden" name="id_dueño_mascota" value="<?php echo $dueño_mascota->getId_dueño_mascota();?>" >
            <div class="form-group">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $dueño_mascota->getNombre();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $dueño_mascota->getApellido();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad" value="<?php echo $dueño_mascota->getEdad();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="id_dirección">Dirección</label>
                <input type="text" class="form-control" id="id_dirección" name="id_dirección" placeholder="Dirección" value="<?php echo $dueño_mascota->getId_dirección();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>