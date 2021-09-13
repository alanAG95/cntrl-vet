<?php
require_once('datos/Db.php');
require_once('entidades/fecha.php');

class fechaDb extends Db{

    public function getOne($fecha){
        
        $sql = "SELECT * 
                FROM fecha 
                WHERE fecha = " . $fecha . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $fecha = new Fecha( $result->fetch_assoc() );
        $result->free();
        return $fecha;
    }
    public function getFecha($id_fecha){
        
        $sql = "SELECT fecha 
                FROM fecha 
                WHERE id_fecha = " . $id_fecha . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $fecha = new fecha($result->fetch_assoc());
        $result->free();
        return $fecha;
    }
    public function getDato($fecha){
        
        $sql = "SELECT id_fecha 
                FROM fecha
                WHERE fecha = '" . $fecha . "'";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $fecha = new Fecha( $result->fetch_assoc() );
        $result->free();
        return $fecha;
    }

    public function getAll(){
        
        $sql = "SELECT *
                FROM fecha";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Fecha');
        $result->free();
        return $array;
    }

    public function update($fecha){
  
            $sql = "UPDATE fecha SET fecha = '" . $fecha->getFecha() . "'                   
                    WHERE id_fecha = " . $fecha->getId_fecha();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $fecha;
    }

    public function insert($fecha){

        $sql = "INSERT INTO fecha( fecha )
                VALUES ('" . $fecha. "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
    }

    public function remove($fecha){
        $sql = "UPDATE fecha
                WHERE id_fecha = " . $fecha->getId_fecha();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>