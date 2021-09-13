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
    }
    Util::setMsj('Está a punto de eliminar el siguiente usuario:','warning',false);
    ?>
    <div class="container">
      <div class="page-header">
        <?php echo Util::getMsj(); ?>
        <h1>Eliminar Usuario</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id_usuario" value="<?php echo $usuario->getId_usuario();?>" >

            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" readonly placeholder="Usuario" value="<?php echo $usuario->getNombre().' '.$usuario->getApellido().' ('.$usuario->getUsuario().')';?>" >
            </div>
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>