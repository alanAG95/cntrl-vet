<?php
require_once('datos/Db.php');
require_once('entidades/instrumental_veterinario.php');

class instrumental_veterinarioDb extends Db{

    public function getOne($id_instrumental_veterinario){
        
        $sql = "SELECT a.*
                FROM instrumental_veterinario AS a
                WHERE id_instrumental_veterinario = " . $id_instrumental_veterinario . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $instrumental_veterinario = new Instrumental_veterinario( $result->fetch_assoc() );
        $result->free();
        return $instrumental_veterinario;
    }

    public function getAll(){
        
        $sql = "SELECT v.*
                FROM instrumental_veterinario AS v
                ORDER BY v.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'instrumental_veterinario');
        $result->free();
        return $array;
    }

    public function update($instrumental_veterinario){
        
        $sql = "UPDATE instrumental_veterinario SET  nombre = '" . $insumo->getNombre() . "',
                                   cantidad = '" . $insumo->getCantidad() . "',
                                   nota = '" . $insumo->getNota() . "'
                WHERE id_instrumental_veterinario = " . $instrumental_veterinario->getId_instrumental_veterinario();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $instrumental_veterinario;
    }

    public function insert($instrumental_veterinario){
        
        $sql = "INSERT INTO instrumental_veterinario (nombre,
                                    cantidad,
                                    nota)
                VALUES ('" . $instrumental_veterinario->getNombre() . "',
                        '" . $instrumental_veterinario->getCantidad() . "',
                        '" . $instrumental_veterinario->getNota() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $instrumental_veterinario->setId_instrumental_veterinario( $this->mysqli->insert_id_instrumental_veterinario );
        return $instrumental_veterinario;
    }

    public function remove($instrumental_veterinario){
        $sql = "DELETE FROM instrumental_veterinario
                WHERE id_instrumental_veterinario = " . $instrumental_veterinario->getId_instrumental_veterinario();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>