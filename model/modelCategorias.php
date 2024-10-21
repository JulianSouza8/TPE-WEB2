<?php
    class modelCategorias{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=super juvi;charset=utf8', 'root', '');
        }

        public function getCategorias(){
            $sentencia = $this->db->prepare("SELECT id, nombre
                                            FROM categorias");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
    }