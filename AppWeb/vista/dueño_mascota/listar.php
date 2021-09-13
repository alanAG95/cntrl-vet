<?php 

if ($_SESSION['usuario']['usuario'] == 'Veterinario') {
  header('Location: http://localhost:82/AppWeb/index.php?modulo=usuario&accion=principal');
  echo "funciono";
} 



?>


<div class="container">
      <div class="page-header">
        <h1>Dueños de mascotas <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=dueño_mascota&accion=editar'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Id</th>
            <th>Dirección</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php




          $arrayDueño_mascotas = $dueño_mascotaNegocio->listar();
          $db_dire = new direcciónDb();//para listar las fonarea
          $dire = new dirección();//para listar las fonarea
          
          if( count($arrayDueño_mascotas) > 0 ){
            foreach( $arrayDueño_mascotas as $dueño_mascota ){
              $dire=$db_dire->getDato($dueño_mascota->getId_dirección());//para listar las fonarea
          ?>

          
              <tr>
              <td><?php echo $dueño_mascota->getId_dueño_mascota();?></td>
                <td><?php echo $dire->getDirección();?></td>
                <td><?php echo $dueño_mascota->getNombre();?></td>
                <td><?php echo $dueño_mascota->getApellido();?></td>
                <td><?php echo $dueño_mascota->getEdad();?></td>
                <td>
                  <a href="?modulo=dueño_mascota&accion=editar&id_dueño_mascota=<?php echo $dueño_mascota->getId_dueño_mascota();?>" data-toggle="tooltip" title="Editar dueño_mascota"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=dueño_mascota&accion=eliminar&id_dueño_mascota=<?php echo $dueño_mascota->getId_dueño_mascota();?>" data-toggle="tooltip" title="Eliminar dueño_mascota"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                  <a href="?modulo=dueño_mascota&accion=listar&id_dueño_mascota=<?php echo $dueño_mascota->getId_dueño_mascota();?>" data-toggle="tooltip" title="Listar mascotas"><span class="glyphicon glyphicon-list"></span></a>
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