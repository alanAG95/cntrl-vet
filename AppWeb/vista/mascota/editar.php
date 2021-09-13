    <?php
    if ($_GET['id_mascota']) {
        $mascota = $mascotaNegocio->recuperar($_GET['id_mascota']);
        $txtAction = 'Editar';
    }else{
        $mascota = new mascota();
        $txtAction = 'Agregar';
    }

    ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Mascota</h1>
      </div>
        <form role="form" method="post" id="principal">
            <input type="hidden" name="id_mascota" value="<?php echo $mascota->getId_mascota();?>" >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $mascota->getNombre();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" value="<?php echo $mascota->getEdad();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="raza">Raza</label>
                <input type="text" class="form-control" id="raza" name="raza" placeholder="Raza" value="<?php echo $mascota->getRaza();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="especie">Especie</label>
                <input type="text" class="form-control" id="especie" name="especie" placeholder="Especie" value="<?php echo $mascota->getEspecie();?>" required>
                <div class="help-block with-errors"></div>
            </div>



            <div class="form-group">
                <label for="id_dueño_mascota">Dueño(a)</label>
                <select class="form-control" id="id_dueño_mascota" name="id_dueño_mascota" >
                    <?php
                        $dueño_mascotaNegocio = new dueño_mascotaNegocio();
                        $arrayDueño_mascota = $dueño_mascotaNegocio->listar();

                        $db_dueño = new dueño_mascotaDb();//para listar las fonarea
                        $dueño_mascota = new dueño_mascota();//para listar las fonarea
                        if( count($arrayDueño_mascota) > 0 ){
                            foreach( $arrayDueño_mascota as $dueño_mascota ){
                              
                    ?>
                 <option <?php if ($dueño_mascota->getId_dueño_mascota()==$mascota->getId_dueño_mascota()) {echo 'selected';} ?> value=<?php echo $dueño_mascota->getId_dueño_mascota();?>  ><?php echo $dueño_mascota->getNombre();?> - <?php echo $dueño_mascota->getApellido(); ?>
                 </option>
                <?php }} ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>

            
            
            
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>