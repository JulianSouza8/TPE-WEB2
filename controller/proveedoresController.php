<?php

require_once "view/vistaProveedores.php";
require_once "model/proveedoresModel.php";


class proveedoresController{

    private $cont;
    private $view;
    private $model;
    private $admin = 0;
    

    function __construct($res){
        $this->view = new vistaProveedores($res->user);
        $this->model = new proveedoresModel();
    }

    public function verproveedores(){
        $proveedores = $this->model->getProveedores();
        $this->view->mostrarProovedores($proveedores);
    }
    public function agregarProveedor(){
        $nombre = $_POST['nombreproveedor'];
        $cuil_cuit = $_POST['cuil_cuit'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $this->model->agregarProveedor($nombre,$cuil_cuit,$ciudad,$telefono);
        $this->view->showHomeLocation();
    }
    public function verpproveedor($id_proveedor){
        $proveedor = $this->model->getProveedor($id_proveedor);
        $this->view->mostrarProveedor($proveedor);
    }
    public function modificarProveedor($id_proveedor){
        $proveedor = $this->model->getProveedor($id_proveedor);
        $this->view->modificarProveedor($proveedor);
    }


    public function updateProveedor($id_proveedor){
        $nombre = $_POST['nombreproveedor'];
        $cuil_cuit = $_POST['cuil_cuit'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $this->model->updateProveedor($id_proveedor,$nombre,$cuil_cuit,$ciudad,$telefono);
        $this->view->showHomeLocation();
    }

    public function deleteProveedor($id_proveedor){
        try{
            $this->model->deleteProveedor($id_proveedor);
            $this->view->showHomeLocation();
        }
        catch (Exception $e) {
            echo 'casi la cagas'; //poner un popup que te diga que no se puede eliminar, un timeout y vuelva al home();
        }
        
    }
}