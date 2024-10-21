<?php
    class loginModel{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=super juvi;charset=utf8', 'root', '');
        }

        

        public function buscarUsuario($usuario){
            $sentencia = $this->db->prepare("SELECT *
                                            FROM usuarios
                                            where usuario = ?");
            $sentencia->execute([$usuario]);
            $user = $sentencia->fetch(PDO::FETCH_OBJ);    
            return $user;
        }
       
    }