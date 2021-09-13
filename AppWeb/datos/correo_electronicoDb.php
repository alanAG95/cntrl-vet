<?php
require_once('datos/Db.php');
require_once('entidades/correo_electronico.php');

class correo_electronicoDb extends Db{

    public function getOne($correo_electronico){
        
        $sql = "SELECT * 
                FROM correo_electronico
                WHERE correo_electronico = '" . $correo_electronico . "'";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $correo_electronico = new Correo_electronico( $result->fetch_assoc() );
        $result->free();
        return $correo_electronico;
    }
    public function getDato($id_correo_electronico){
        
        $sql = "SELECT correo_electronico 
                FROM correo_electronico
                WHERE id_correo_electronico = '" . $id_correo_electronico . "'";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $correo_electronico = new Correo_electronico( $result->fetch_assoc() );
        $result->free();
        return $correo_electronico;
    }
    public function getAll(){
        
        $sql = "SELECT *
                FROM correo_electronico";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'correo_electronico');
        $result->free();
        return $array;
    }

    public function update($correo_electronico){
  
            $sql = "UPDATE correo_electronico SET correo_electronico = '" . $correo_electronico->getCorreo_electronico() . "'                   
                    WHERE id_correo_electronico = " . $correo_electronico->getId_correo_electronico();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $correo_electronico;
    }

    public function insert($correo_electronico){

        $sql = "INSERT INTO correo_electronico( correo_electronico )
                VALUES ('" . $correo_electronico. "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
    }

    public function remove($correo_electronico){
        $sql = "UPDATE correo_electronico
                WHERE correo_electronico = " . $correo_electronico->getId_correo_electronico();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>