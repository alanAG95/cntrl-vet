<?php if ($_SESSION['usuario']['usuario'] == 'veterinario') {
  header('Location: http://localhost:82/AppWeb/index.php?modulo=usuario&accion=principal');
  echo "funciono";}
  if ($_SESSION['usuario']['usuario'] == 'asistente') {
  header('Location: http://localhost:82/AppWeb/index.php?modulo=usuario&accion=principal');
  echo "funciono";
} ?>
    <?php
    if ($_GET['id_usuario']) {
        $usuario = $usuarioNegocio->recuperar($_GET['id_usuario']);
        $txtAction = 'Editar';
        $telDB = new teléfonoDb();
        $tel = new teléfono();
        $tel = $telDB->getDato($usuario->getId_teléfono());
        $db_correo = new correo_electronicoDb();//para listar las fonarea
        $correo = new correo_electronico();//para listar las fonarea
        $correo = $db_correo->getDato($usuario->getId_correo_electronico());
        $db_dire = new direcciónDb();//para listar las fonarea
        $dire = new dirección();//para listar las fonarea
        $dire = $db_dire->getDato($usuario->getId_dirección());
        $usuario->setId_teléfono($tel->getTeléfono());
        $usuario->setId_correo_electronico($correo->getCorreo_electronico());
        $usuario->setId_dirección($dire->getDirección());

    }else{
        $usuario = new usuario();
        $txtAction = 'Agregar';
    }
    ?>

    <div class="container">
      <div class="page-header">
        <?php echo Util::getMsj(); ?>
        <h1><?php echo $txtAction; ?> Usuario</h1>
        <script src="js/validar.js"></script>
      </div>
      
        <form role="form" method="post" id="principal" onsubmit="return validar();">
            
            <input type="hidden" name="id_usuario" value="<?php echo $usuario->getId_usuario();?>" >
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <select class="form-control" id="usuario" name="usuario">
                    <option value="Asistente" <?php if($usuario->getUsuario() == 'Asistente') {echo "selected";} ?>  >Asistente</option>
                    <option value="Veterinario" <?php if($usuario->getUsuario() == 'Veterinario') {echo "selected";} ?>  >Veterinario</option>
                    <option value="Administrador" <?php if($usuario->getUsuario() == 'Administrador') {echo "selected";} ?>  >Administrador</option>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="id_teléfono">Teléfono</label>
                <input type="number" class="form-control" id="id_teléfono" name="id_teléfono" placeholder="Teléfono" value="<?php echo $usuario->getId_teléfono();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="id_dirección">Dirección</label>
                <input type="text" class="form-control" id="id_dirección" name="id_dirección" placeholder="Dirección" value="<?php echo $usuario->getId_dirección();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="id_correo_electronico">Email</label>
                <input type="email" class="form-control" id="id_correo_electronico" name="id_correo_electronico" placeholder="Correo electronico" value="<?php echo $usuario->getId_correo_electronico();//type es email ?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $usuario->getNombre();?>"  required>
                <script src="validarRUT.js"></script>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $usuario->getApellido();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group" >
                <label for="rut">Rut</label>
                <input type="text" class="form-control" id="rut" name="rut" placeholder="Rut" value="<?php echo $usuario ->getRut();?>" required oninput="checkRut(this)" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="especialidad">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="Especialidad" value="<?php echo $usuario ->getEspecialidad();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad" value="<?php echo $usuario ->getEdad();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            
            <?php if($_GET['id_usuario']){ ?>
            <div class="alert alert-info" role="alert">Para cambiar su contraseña, complete los siguientes campos.<br>Para <strong>No</strong> cambiar su contraseña, <strong>No</strong> complete los siguientes campos.</div>
            <?php } ?>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" value="" <?php if(!$_GET['id_usuario']) { ?> required <?php } ?> >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="confpassword">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Confirmar Contraseña" value="" <?php if(!$_GET['id_usuario']) { ?> required data-match="#password" <?php } ?> >
                <div class="help-block with-errors"></div>
            </div>

            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>