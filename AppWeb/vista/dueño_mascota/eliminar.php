<?php if ($_SESSION['usuario']['usuario'] == 'Veterinario') {
  header('Location: http://localhost:82/AppWeb/index.php?modulo=usuario&accion=principal');
  echo "funciono";
} ?>
    <?php
    if ($_GET['id_dueño_mascota']) {
        $dueño_mascota = $dueño_mascotaNegocio->recuperar($_GET['id_dueño_mascota']);
    }
    Util::setMsj('Está a punto de eliminar el siguiente Dueño:','warning',false);
    ?>
    <div class="container">
      <div class="page-header">
        <?php echo Util::getMsj(); ?>
        <h1>Eliminar Dueño</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id_dueño_mascota" value="<?php echo $dueño_mascota->getId_dueño_mascota();?>" >
            <div class="form-group">
                <label for="nombre">Dueño</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly placeholder="Nombre" value="<?php echo $dueño_mascota->getNombre();?>" >
            </div>
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>