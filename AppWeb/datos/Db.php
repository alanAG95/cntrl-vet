<?php
abstract class Db {

    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;
    public $mysqli;

    public function __construct() {
        $this->dbhost = "localhost";
        $this->dbuser = "root";
        $this->dbpass = "";
        $this->dbname = "veterinaria-v2";

        $this->connect();
    }

    protected function connect(){
        $this->mysqli = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname) or die("Error " . mysqli_error($mysqli));
    }

    //Auxiliares
    protected function resourceToArray($res){
        $array = array();
        while ($row = $res->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }

    protected function resourceToObjects($resultado,$class){
        $array = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $array[] = new $class($row);
        }
        return $array;
    }

}
?>