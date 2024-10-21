<?php
    class productosModel{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=super_juvi;charset=utf8', 'root', '');
        }

        public function getProductos(){
            $sentencia = $this->db->prepare("SELECT p.id, p.nombre as nombre_producto,c.nombre as nombre_categoria 
                                            FROM productos p 
                                            inner join categorias c on p.id_categoria = c.id
                                            order by p.id");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        public function getProducto($id_producto){
            $sentencia = $this->db->prepare("SELECT p.id, p.nombre as nombre_producto, m.unidad_medida,c.nombre as nombre_categoria, prv.nombre as nombre_proveedor, prv.cuil_cuit
                                            FROM productos p 
                                            inner join medidas m on p.id_unidad_medida = m.id
                                            inner join categorias c on p.id_categoria = c.id
                                            inner join proveedores prv on p.id_proveedor = prv.id
                                            where p.id = $id_producto
                                            order by p.id");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        public function borrarProducto($id_producto){
            $sentencia = $this->db->prepare("DELETE FROM productos where id = $id_producto");
            $sentencia->execute();
        }
        public function updateProducto($id_producto,$nombre,$categoria,$unidad_medida,$id_proveedor){
            $sentencia = $this->db->prepare("UPDATE productos
                                             SET nombre=?,id_unidad_medida = ? ,id_categoria=?, id_proveedor =?
                                             where id = ?");
            $sentencia->execute([$nombre,$unidad_medida,$categoria,$id_proveedor,$id_producto]);
        }
        public function agregarProducto($nombre,$categoria,$unidad_medida,$proveedor){
            $sentencia = $this->db->prepare("INSERT INTO productos(nombre, id_unidad_medida, id_categoria, id_proveedor) VALUES(?,?,?,?)");
            $sentencia->execute([$nombre,$unidad_medida,$categoria,$proveedor]);
            return;
        }
        
        
        public function filtroCategoria($id_categoria){
                $sentencia = $this->db->prepare("SELECT p.id, p.nombre as nombre_producto, m.unidad_medida,c.nombre as nombre_categoria, prv.nombre as nombre_proveedor, prv.cuil_cuit
                                                FROM productos p 
                                                inner join medidas m on p.id_unidad_medida = m.id
                                                inner join categorias c on p.id_categoria = c.id
                                                inner join proveedores prv on p.id_proveedor = prv.id
                                                where p.id_categoria = $id_categoria
                                                order by p.id");
                $sentencia->execute();
                return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }



        
    }