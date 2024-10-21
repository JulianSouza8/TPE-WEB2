<?php
    require_once 'controller/productosController.php';
    require_once 'controller/proveedoresController.php';
    require_once 'controller/loginController.php';
    require_once 'libs/response.php';
    require_once 'middlewares/session.auth.middlewere.php';
    require_once 'middlewares/verify.auth.middleware.php';
    //require_once 'RouterClass.php';


    //define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    //define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    //define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

    //$r = new Router();

    //$r->addRoute("productos","GET","productosController","verproductos");

    define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

    $res = new Response();


    $action = 'home';

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch ($params[0]) {
        case 'productos':
            sessionAuthMiddleware($res);
            $productosController = new productosController($res);
            $productosController->verproductos();
        break;
        case 'producto':
            sessionAuthMiddleware($res);
            $productosController = new productosController($res);
            $productosController->verproducto($params[1]);
        break;
        case 'delete':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $productosController = new productosController($res);
            $productosController->eliminarproducto($params[1]);
        break;
        case 'modificar':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $productosController = new productosController($res);
            $productosController->modificar($params[1]);
        break;
        case 'update':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $productosController = new productosController($res);
            $productosController->update($params[1]);
        break;
        case 'proveedores':
            sessionAuthMiddleware($res);
            $proveedoresController = new proveedoresController($res);
            $proveedoresController->verproveedores();
        break;
        case 'agregarProveedor':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $proveedoresController = new proveedoresController($res);
            $proveedoresController->agregarProveedor();
        break;
        case 'proveedor':
            sessionAuthMiddleware($res);
            $proveedoresController = new proveedoresController($res);
            $proveedoresController->verpproveedor($params[1]);
        break;
        case 'modificarProveedor':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $proveedoresController = new proveedoresController($res);
            $proveedoresController->modificarProveedor($params[1]);
        break;
        case 'updateProveedor':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $proveedoresController = new proveedoresController($res);
            $proveedoresController->updateProveedor($params[1]);
        break;
        case 'deleteProveedor':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $proveedoresController = new proveedoresController($res);
            $proveedoresController->deleteProveedor($params[1]);
        break;
        case 'agregarProducto':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $productosController = new productosController($res);
            $productosController->agregarProducto();
        break;
        case 'filtrar':
            sessionAuthMiddleware($res);
            $productosController = new productosController($res);
            $productosController->filtrado();
        break;
        case 'login':
            sessionAuthMiddleware($res);
            $loginController = new loginController();
            $loginController->verLogin();
        break;
        case 'logear':
            sessionAuthMiddleware($res);
            $loginController = new loginController();
            $loginController->logear();
        break;
        case 'logout':
            $loginController = new loginController();
            $loginController->logout();
        break;
        default:
        echo ('404 Page not found');
        break;
    }
?>