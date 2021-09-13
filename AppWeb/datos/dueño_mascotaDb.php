<?php
require_once('datos/Db.php');
require_once('entidades/dueño_mascota.php');

class dueño_mascotaDb extends Db{

    public function getOne($id_dueño_mascota){ //funcionando ok
        
        $sql = "SELECT a.*
                FROM dueño_mascota AS a
                WHERE id_dueño_mascota = " . $id_dueño_mascota . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $dueño_mascota = new Dueño_mascota( $result->fetch_assoc() );
        $result->free();
        return $dueño_mascota;
    }

    public function getAll(){//funcionando ok
        
        $sql = "SELECT * FROM dueño_mascota";

        $result = mysqli_query($this->mysqli, $sql)or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,"dueño_mascota");
        
        return $array;
    }

    public function update($dueño_mascota){
        
        $sql = "UPDATE dueño_mascota SET  id_dirección = '" . $dueño_mascota->getId_dirección() . "',
                                   nombre = '" . $dueño_mascota->getNombre() . "' ,
                                   apellido = '" . $dueño_mascota->getApellido() . "',
                                   edad = '" . $dueño_mascota->getEdad() . "'
                WHERE id_dueño_mascota = " . $dueño_mascota->getId_dueño_mascota();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $dueño_mascota;
    }

    public function insert($dueño_mascota){
        
        $sql = "INSERT INTO dueño_mascota (id_dirección,
                                    nombre,
                                    apellido,
                                    edad)
                VALUES ( '" . $dueño_mascota->getId_dirección() . "', 
                        '" . $dueño_mascota->getNombre() . "',
                        '" . $dueño_mascota->getApellido() . "',
                        '" . $dueño_mascota->getEdad() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $dueño_mascota->setId_dueño_mascota( $this->mysqli->insert_id_dueño_mascota );
        return $dueño_mascota;
    }

    public function remove($dueño_mascota){//funcionando ok
        $sql = "DELETE FROM dueño_mascota
                WHERE id_dueño_mascota = " . $dueño_mascota->getId_dueño_mascota();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>