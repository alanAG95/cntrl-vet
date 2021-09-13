<?php
require_once('datos/Db.php');
require_once('entidades/insumo.php');

class insumoDb extends Db{

    public function getOne($id_insumo){
        
        $sql = "SELECT a.*
                FROM insumo AS a
                WHERE id_insumo = " . $id_insumo . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $insumo = new Insumo( $result->fetch_assoc() );
        $result->free();
        return $insumo;
    }

    public function getAll(){
        
        $sql = "SELECT v.*
                FROM insumo AS v
                ORDER BY v.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'insumo');
        $result->free();
        return $array;
    }

    public function update($insumo){
        
        $sql = "UPDATE insumo SET  
                                    nombre = '" . $insumo->getNombre() . "',
                                   cantidad = '" . $insumo->getCantidad() . "',
                                   nota = '" . $insumo->getNota() . "'
                WHERE id_insumo = " . $insumo->getId_insumo();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $insumo;
    }

    public function insert($insumo){
        
        $sql = "INSERT INTO insumo (nombre,
                                    cantidad,
                                    nota)
                VALUES ('" . $insumo->getNombre() . "',
                        '" . $insumo->getCantidad() . "',
                        '" . $insumo->getNota() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $insumo->setId_insumo( $this->mysqli->insert_id_insumo );
        return $insumo;
    }

    public function remove($insumo){
        $sql = "DELETE FROM insumo
                WHERE id_insumo = " . $insumo->getId_insumo();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>