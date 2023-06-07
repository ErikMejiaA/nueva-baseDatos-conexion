<?php
    namespace Models;
    class Clientes {

        protected static $conn;
        protected static $columnsTbl=['idCliente','primerNombre', 'segundoNombre', 'primerApellido', 'segundoApellido', 'emailCliente', 'fechaNacimiento', 'idReg'];
        private $idCliente;
        private $primerNombre;
        private $segundoNombre;
        private $primerApellido;
        private $segundoApellido;
        private $emailCliente;
        private $fechaNacimiento;
        private $idReg;


        public function __construct($args = []){
            $this -> idCliente = $args['idCliente'] ?? '';
            $this -> primerNombre = $args['primerNombre'] ?? '';
            $this -> segundoNombre = $args['segundoNombre'] ?? '';
            $this -> primerApellido = $args['primerApellido'] ?? '';
            $this -> segundoApellido = $args['segundoApellido'] ?? '';
            $this -> emailCliente = $args['emailCliente'] ?? '';
            $this -> fechaNacimiento = $args['fechaNacimiento'] ?? '';
            $this -> idReg = $args['idReg'] ?? '';
        }

        public function saveData($data){
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO cliente ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($data);
        }

        public function loadAllData(){
            $sql = "SELECT idCliente, primerNombre, segundoNombre, primerApellido, segundoApellido, emailCliente,  fechaNacimiento, idReg FROM cliente";
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
                if($columna === 'idCliente') continue;
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