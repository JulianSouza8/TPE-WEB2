<?php
    class modelMedidas{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=super_juvi;charset=utf8', 'root', '');
        }

        public function getMedidas(){
            $sentencia = $this->db->prepare("SELECT id, unidad_medida
                                            FROM medidas");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
    }