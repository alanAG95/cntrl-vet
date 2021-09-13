<?php
require_once('datos/Db.php');
require_once('entidades/mascota.php');

class mascotaDb extends Db{

    public function getOne($id_mascota){
        
        $sql = "SELECT *
                FROM mascota
                WHERE id_mascota = " . $id_mascota . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $mascota = new Mascota( $result->fetch_assoc() );
        $result->free();
        return $mascota;
    }

    public function getAll(){
        
        $sql = "SELECT v.*
                FROM mascota AS v
                ORDER BY v.especie ASC, v.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'mascota');
        $result->free();
        return $array;
    }

    public function update($mascota){
        
        $sql = "UPDATE mascota SET  
        id_dueño_mascota = '" . $mascota->getId_dueño_mascota() . "',
        raza = '" . $mascota->getRaza() . "',
        nombre = '" . $mascota->getNombre() . "' ,
        especie = '" . $mascota->getEspecie() . "',
        edad = '" . $mascota->getEdad() . "'
        WHERE id_mascota = " . $mascota->getId_mascota();
        
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $mascota;
    }

    public function insert($mascota){
        
        $sql = "INSERT INTO mascota (id_dueño_mascota,
                                    raza,
                                    nombre,
                                    especie,
                                    edad)
                VALUES ('" . $mascota->getId_dueño_mascota() . "', 
                        '" . $mascota->getRaza() . "',
                        '" . $mascota->getNombre() . "',
                        '" . $mascota->getEspecie() . "',
                        '" . $mascota->getEdad() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $mascota->setId_mascota( $this->mysqli->insert_id );
        return $mascota;
    }

    public function remove($mascota){
        $sql = "DELETE FROM mascota
                WHERE id_mascota = " . $mascota->getId_mascota();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>