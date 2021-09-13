
<?php
    if ($_GET['id_cita']) {
        $cita = $citaNegocio->recuperar($_GET['id_cita']);
        $txtAction = 'Editar';
        $fechaDB = new fechaDb();
        $fecha = new fecha();
        $fecha = $fechaDB->getFecha($cita->getId_fecha());
        $teléfonoDB = new teléfonoDb();
        $teléfono = new teléfono();
        $teléfono = $teléfonoDB->getDato($cita->getId_teléfono());

        $cita->setId_fecha($fecha->getFecha());
        $cita->setId_teléfono($teléfono->getTeléfono());

    }else{
        $cita = new cita();
        $txtAction = 'Agregar';
        
    }
    ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Citas</h1>
      </div>
        <form role="form" method="post" id="principal">
            <input type="hidden" name="id_cita" value="<?php echo $cita->getId_cita();?>" >
            <div class="form-group">
                <label for="id_dueño_mascota">Dueño(a)</label>
                <select class="form-control" id="id_dueño_mascota" name="id_dueño_mascota" >
                    <?php
                        $dueño_mascotaNegocio = new dueño_mascotaNegocio();
                        $arrayDueño_mascota = $dueño_mascotaNegocio->listar();
                        $dueño_mascota = new dueño_mascota();//para listar las fonarea
                        if( count($arrayDueño_mascota) > 0 ){
                            foreach( $arrayDueño_mascota as $dueño_mascota ){
                              
                    ?>
                 <option <?php if ($dueño_mascota->getId_dueño_mascota()==$cita->getId_dueño_mascota()) {echo 'selected';} ?> value=<?php echo $dueño_mascota->getId_dueño_mascota();?>  ><?php echo $dueño_mascota->getNombre();?> - <?php echo $dueño_mascota->getApellido(); ?>
                 </option>
                <?php }} ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="id_usuario">Responsable</label>
                <select class="form-control" id="id_usuario" name="id_usuario" >
                    <?php
                        $usuarioNegocio = new usuarioNegocio();
                        $arrayUsuarios = $usuarioNegocio->listar();
                        $usuario = new usuario();//para listar las fonarea
                        if( count($arrayUsuarios) > 0 ){
                            foreach( $arrayUsuarios as $usuario ){
                              
                    ?>
                 <option <?php if ($usuario->getId_usuario()==$cita->getId_usuario()) {echo 'selected';} ?> value=<?php echo $usuario->getId_usuario();?>  ><?php echo $usuario->getNombre();?> - <?php echo $usuario->getApellido(); ?>
                 </option>
                <?php }} ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="id_fecha">Fecha</label>
                <input type="date" class="form-control" id="id_fecha" name="id_fecha" value="<?php echo $cita->getId_fecha();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="id_teléfono">Teléfono</label>
                <input type="number" class="form-control" id="id_teléfono" name="id_teléfono" placeholder="Teléfono" value="<?php echo $cita->getId_teléfono();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="id_mascota">Mascota</label>
                <select class="form-control" id="id_mascota" name="id_mascota" >
                    <?php
                        $mascotaNegocio = new mascotaNegocio();
                        $arrayMascotas = $mascotaNegocio->listar();
                        $mascota = new mascota();//para listar las fonarea
                        if( count($arrayMascotas) > 0 ){
                            foreach( $arrayMascotas as $mascota ){
                              
                    ?>
                 <option <?php if ($mascota->getId_mascota()==$cita->getId_mascota()) {echo 'selected';} ?> value=<?php echo $mascota->getId_mascota();?>  required ><?php echo $mascota->getNombre();?> - <?php echo $mascota->getEspecie(); ?>
                 </option>
                <?php }} ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="nota">Nota</label>
                <input type="text" class="form-control" id="nota" name="nota" placeholder="Nota" value="<?php echo $cita->getNota();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>

