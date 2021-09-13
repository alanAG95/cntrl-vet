    
    <div class="container">
      <div class="page-header">
        <h1>Mascotas <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=mascota&accion=editar'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Dueño(a)</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $arrayMascotas = $mascotaNegocio->listar();
          $db_dueño = new dueño_mascotaDb();//para listar las fonarea
          $dueño = new dueño_mascota();//para listar las fonarea
          if( count($arrayMascotas) > 0 ){
            foreach( $arrayMascotas as $mascota ){
              $dueño=$db_dueño->getOne($mascota->getId_dueño_mascota());//para listar las fonarea
          ?>
              <tr>
                <td><?php echo $mascota->getId_mascota();?></td>
                <td><?php echo $mascota->getNombre();?></td>
                <td><?php echo $mascota->getRaza();?></td>
                <td><?php echo $mascota->getEdad();?></td>
                <td><?php echo $dueño->getNombre();?> - <?php echo $dueño->getApellido();?></td>
                <td>
                  <a href="?modulo=mascota&accion=editar&id_mascota=<?php echo $mascota->getId_mascota();?>" data-toggle="tooltip" title="Editar mascota"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=mascota&accion=eliminar&id_mascota=<?php echo $mascota->getId_mascota();?>" data-toggle="tooltip" title="Eliminar mascota"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                  <a href="?modulo=mascota&accion=listar&id_mascota=<?php echo $mascota->getId_mascota();?>" data-toggle="tooltip" title="Listar mascotas"><span class="glyphicon glyphicon-list"></span></a>
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
          }
          ?>
        </tbody>
      </table>
    </div>