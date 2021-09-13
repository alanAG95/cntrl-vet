<?php
require_once('datos/Db.php');
require_once('entidades/dirección.php');

class direcciónDb extends Db{

    public function getOne($dirección){//bueno
        
        $sql = "SELECT * 
                FROM dirección 
                WHERE dirección = '" . $dirección . "'";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $dirección = new Dirección( $result->fetch_assoc() );
        $result->free();
        return $dirección;
    }
    public function getDato($id_dirección){//bueno
        
        $sql = "SELECT dirección 
                FROM dirección
                WHERE id_dirección = '" . $id_dirección . "'";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $dirección = new Dirección( $result->fetch_assoc() );
        $result->free();
        return $dirección;
    }
    public function getAll(){//bueno
        
        $sql = "SELECT *
                FROM dirección";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Dirección');
        $result->free();
        return $array;
    }

    public function update($dirección){
  
            $sql = "UPDATE dirección SET dirección = '" . $dirección->getDirección() . "'                   
                    WHERE id_dirección = " . $dirección->getId_dirección();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $dirección;
    }

    public function insert($dirección){//buena

        $sql = "INSERT INTO dirección( dirección )
                VALUES ('" . $dirección. "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
    }

    public function remove($dirección){
        $sql = "UPDATE dirección
                WHERE id_dirección = " . $dirección->getId_dirección();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>