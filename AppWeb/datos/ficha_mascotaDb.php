<?php
require_once('datos/Db.php');
require_once('entidades/ficha_mascota.php');

class ficha_mascotaDb extends Db{

    public function getOne($id_ficha_mascota){
        
        $sql = "SELECT v.* 
                FROM ficha_mascota AS v
                WHERE id_ficha_mascota = " . $id_ficha_mascota . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $ficha_mascota = new Ficha_mascota( $result->fetch_assoc() );
        $result->free();
        return $ficha_mascota;
    }

    public function getAll(){
        
        $sql = "SELECT v.*
                FROM ficha_mascota";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Telefono');
        $result->free();
        return $array;
    }

    public function update($ficha_mascota){
  
           $sql = "UPDATE ficha_mascota SET  id_mascota = '" . $ficha_mascota->getId_mascota() . "',
                                   detalle_rutinario = '" . $ficha_mascota->getDetalle_rutinario() . "' ,
                                   detalle_no_rutinario = '" . $ficha_mascota->getDetalle_no_rutinario() . "'
                WHERE id_ficha_mascota = " . $ficha_mascota->getId_ficha_mascota();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $ficha_mascota;
    }

    public function insert($ficha_mascota){

        $sql = "INSERT INTO ficha_mascota (id_mascota,
                                    detalle_rutinario,
                                    detalle_no_rutinario)
                VALUES ( '" . $ficha_mascota->getId_mascota() . "', 
                        '" . $ficha_mascota->getDetalle_rutinario() . "',
                        '" . $ficha_mascota->getDetalle_no_rutinario() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $ficha_mascota->setId_ficha_mascota( $this->mysqli->insert_id_ficha_mascota );
        return $ficha_mascota;
    }

    public function remove($ficha_mascota){
        $sql = "UPDATE ficha_mascota
                WHERE id_ficha_mascota = " . $id_ficha_mascota->getId_ficha_mascota();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>