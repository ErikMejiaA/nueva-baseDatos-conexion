<?php
    namespace Models;
    class Paises {

        protected static $conn;
        protected static $columnsTbl=['idPais','nombrePais'];
        private $idPais;
        private $nombrePais;

        public function __construct($args = []){
            $this->idPais = $args['idPais'] ?? '';
            $this->nombrePais = $args['nombrePais'] ?? '';
        }

        public function saveData($data){
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO pais ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }

        public function loadAllData(){
            $sql = "SELECT idPais,nombrePais FROM pais";
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
                if($columna === 'idPais') continue;
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