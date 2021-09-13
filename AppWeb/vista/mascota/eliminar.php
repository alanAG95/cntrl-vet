    <?php
    if ($_GET['id_mascota']) {
        $mascota = $mascotaNegocio->recuperar($_GET['id_mascota']);
    }
    Util::setMsj('Está a punto de eliminar la siguiente Mascota:','warning',false);
    ?>
    <div class="container">
      <div class="page-header">
        <?php echo Util::getMsj(); ?>
        <h1>Eliminar Mascota</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id_mascota" value="<?php echo $mascota->getId_mascota();?>" >
            <div class="form-group">
                <label for="nombre">Mascota</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly placeholder="Nombre" value="<?php echo $mascota->getNombre();?>" >
            </div>
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>