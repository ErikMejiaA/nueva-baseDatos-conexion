<?php
    namespace Models;
    class Departamentos {

        protected static $conn;
        protected static $columnsTbl=['idDep','nombreDep', 'idPais'];
        private $idDep;
        private $nombreDep;
        private $idPais;

        public function __construct($args = []){
            $this -> idDep = $args['idDep'] ?? '';
            $this -> nombreDep = $args['nombreDep'] ?? '';
            $this -> idPais = $args['idPais'] ?? '';
        }

        public function saveData($data){
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO departamento ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }

        public function loadAllData(){
            $sql = "SELECT idDep, nombreDep, idPais FROM departamento";
            $stmt= self::$conn->prepare($sql);
            //$stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute();
            $miTienda = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miTienda;
        }

        public static function setConn($connBd){
            self::$conn = $connBd;
        }

        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'idDep') continue;
                $atributos [$columna]=$this->$columna;
             }
             return $atributos;
        }

        public function sanitizarAttributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$conn->quote($value);
            }
            return $sanitizado;
        }
    }
?>