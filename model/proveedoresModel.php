<?php
    class proveedoresModel{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=super_juvi;charset=utf8', 'root', '');
        }

        
        public function getProveedores(){
            $sentencia = $this->db->prepare("SELECT id,nombre,cuil_cuit,ciudad,telefono
                                            FROM proveedores
                                            order by id");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
        public function agregarProveedor($nombre,$cuil_cuit,$ciudad,$telefono){
            $sentencia = $this->db->prepare("INSERT INTO proveedores(nombre, cuil_cuit, ciudad, telefono) VALUES(?,?,?,?)");
            $sentencia->execute([$nombre, $cuil_cuit, $ciudad, $telefono]);
            return;
        }

        public function getProveedor($id_proveedor){
            $sentencia = $this->db->prepare("SELECT id,nombre,cuil_cuit,ciudad,telefono
                                            FROM proveedores 
                                            where id = $id_proveedor");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        public function updateProveedor($id_proveedor,$nombre,$cuil_cuit,$ciudad,$telefono){
            $sentencia = $this->db->prepare("UPDATE proveedores
                                             SET nombre = ?, cuil_cuit = ?, ciudad = ?, telefono = ?
                                             where id = ?");
            $sentencia->execute([$nombre,$cuil_cuit,$ciudad,$telefono,$id_proveedor]);
        }
        public function deleteProveedor($id_proveedor){
            $sentencia = $this->db->prepare("DELETE FROM proveedores where id = $id_proveedor");
            $sentencia->execute();
        }
}
