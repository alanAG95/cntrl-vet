<?php
require_once('datos/Db.php');
require_once('entidades/teléfono.php');

class teléfonoDb extends Db{

    public function getOne($teléfono){
        
        $sql = "SELECT * 
                FROM teléfono
                WHERE teléfono = '" . $teléfono . "'";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $teléfono = new Teléfono( $result->fetch_assoc() );
        $result->free();
        return $teléfono;
    }
    public function getDato($id_teléfono){
        
        $sql = "SELECT teléfono 
                FROM teléfono
                WHERE id_teléfono = '" . $id_teléfono . "'";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $teléfono = new Teléfono( $result->fetch_assoc() );
        $result->free();
        return $teléfono;
    }
    public function getAll(){
        
        $sql = "SELECT *
                FROM teléfono";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Teléfono');
        $result->free();
        return $array;
    }

    public function update($teléfono){
  
            $sql = "UPDATE teléfono SET teléfono = '" . $teléfono->getNumero() . "'                   
                    WHERE id_teléfono = " . $teléfono->getId_teléfono();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $teléfono;
    }

    public function insert($teléfono){

        $sql = "INSERT INTO teléfono( teléfono )
                VALUES ('" . $teléfono. "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
    }

    public function remove($teléfono){
        $sql = "UPDATE teléfono
                WHERE id_teléfono = " . $teléfono->getId_teléfono();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>