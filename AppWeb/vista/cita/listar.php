<div class="container">
      <div class="page-header">
        <h1>Citas <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=cita&accion=editar'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Id</th>
            <th>Dueño(a)</th>
            <th>Responsable</th>
            <th>Fecha</th>
            <th>Teléfono</th>
            <th>Mascota</th>
            <th>Nota</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $arraycita = $citaNegocio->listar();
          $db_dueño = new dueño_mascotaDb();//para listar las fonarea
          $dueño = new dueño_mascota();//para listar las fonarea
          $db_usuario = new usuarioDb();//para listar las fonarea
          $usuario = new usuario();//para listar las fonarea
           $db_fecha = new fechaDb();//para listar las fonarea
          $fecha = new fecha();//para listar las fonarea
           $db_teléfono = new teléfonoDb();//para listar las fonarea
          $teléfono = new teléfono();//para listar las fonarea
           $db_mascota = new mascotaDb();//para listar las fonarea
          $mascota = new mascota();//para listar las fonarea
          if( count($arraycita) > 0 ){
            foreach( $arraycita as $cita ){
              $dueño=$db_dueño->getOne($cita->getId_dueño_mascota());//para listar las fonarea
              $usuario=$db_usuario->getOne($cita->getId_usuario());//para listar las fonarea
              $fecha=$db_fecha->getFecha($cita->getId_fecha());//para listar las fonarea
              $teléfono=$db_teléfono->getDato($cita->getId_teléfono());//para listar las fonarea
              $mascota=$db_mascota->getOne($cita->getId_mascota());//para listar las fonarea

              


              ?>
              <tr>
              <td><?php echo $cita->getId_cita();?></td>
                <td><?php echo $dueño->getNombre();?> - <?php echo $dueño->getApellido();?></td>
                <td><?php echo $usuario->getNombre();?> - <?php echo $usuario->getApellido();?></td>
                <td><?php echo $fecha->getFecha();?></td>
                <td><?php echo $teléfono->getTeléfono();?></td>
                <td><?php echo $mascota->getNombre();?> - <?php echo $mascota->getEspecie();?></td>
                <td><?php echo $cita->getNota();?></td>
                <td>
                  <a href="?modulo=cita&accion=editar&id_cita=<?php echo $cita->getId_cita();?>" data-toggle="tooltip" title="Editar cita"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=cita&accion=eliminar&id_cita=<?php echo $cita->getId_cita();?>" data-toggle="tooltip" title="Eliminar cita"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                  <a href="?modulo=cita&accion=listar&id_cita=<?php echo $cita->getId_cita();?>" data-toggle="tooltip" title="Listar cita"><span class="glyphicon glyphicon-list"></span></a>
                </td>
              </tr>
          <?php
          }
          }else{
          ?>

          <tr>
            <td colspan="4">No se encontraron resultados</td>
          </tr>
          <?php
          }?>
        </tbody>
      </table>
    </div>