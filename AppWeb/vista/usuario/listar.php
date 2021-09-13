<?php if ($_SESSION['usuario']['usuario'] == 'Veterinario') {
  header('Location: http://localhost:82/AppWeb/index.php?modulo=usuario&accion=principal');
  echo "funciono";}
  if ($_SESSION['usuario']['usuario'] == 'Asistente') {
  header('Location: http://localhost:82/AppWeb/index.php?modulo=usuario&accion=principal');
  echo "funciono";
} ?>    



    <div class="container">
      <div class="page-header">
        <h1>Usuarios <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=usuario&accion=editar'">Agregar</button></h1>
      </div>








      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Correo</th>
            <th>Especialidad</th>
            <th>Edad</th>
            <th>Rut</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $arrayUsuarios = $usuarioNegocio->listar();
          $db_tel = new teléfonoDb();//para listar las fonarea
          $tel = new teléfono();//para listar las fonarea
          $db_correo = new correo_electronicoDb();//para listar las fonarea
          $correo = new correo_electronico();//para listar las fonarea
          $db_dire = new direcciónDb();//para listar las fonarea
          $dire = new dirección();//para listar las fonarea



          if( count($arrayUsuarios) > 0 ){
            foreach( $arrayUsuarios as $usuario ){
              $tel=$db_tel->getDato($usuario->getId_teléfono());//para listar las fonarea
              $correo=$db_correo->getDato($usuario->getId_correo_electronico());//para listar las fonarea
              $dire=$db_dire->getDato($usuario->getId_dirección());//para listar las fonarea
              ?>

              <tr>
                <td><?php echo $usuario->getId_usuario();?></td>
                <td><?php echo $usuario->getUsuario();?></td>
                <td><?php echo $usuario->getNombre();?></td>
                <td><?php echo $usuario->getApellido();?></td>
                <td><?php echo $tel->getTeléfono();?></td>
                <td><?php echo $dire->getDirección();?></td>
                <td><?php echo $correo->getCorreo_electronico();?></td>
                <td><?php echo $usuario->getEspecialidad();?></td>
                <td><?php echo $usuario->getEdad();?></td>
                <td><?php echo $usuario->getRut();?></td>
                <td>
                  <a href="?modulo=usuario&accion=editar&id_usuario=<?php echo $usuario->getId_usuario();?>" data-toggle="tooltip" title="Editar usuario"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <?php if($usuario->getId_usuario() != $_SESSION['usuario']['id_usuario']){
                  ?> 
                  <a href="?modulo=usuario&accion=eliminar&id_usuario=<?php echo $usuario->getId_usuario();?>" data-toggle="tooltip" title="Eliminar usuario"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                <?php } ?>
                </td>
              </tr>
          <?php
            }
          }else{
          ?>
          <tr>
            <td colspan="5">No se encontraron resultados</td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>