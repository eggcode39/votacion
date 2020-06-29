<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 29/06/2020
 * Time: 11:35
 */
try{
    //Establecer Zona Horaria
    date_default_timezone_set('America/Lima');

    //Para Mostrar o No Errores (Comentado Para SI, Descomentado Para NO)
    //error_reporting(E_ALL);

    //Variables Globales
    require 'core/globals.php';

    //Levantamiento del Log para registro de errores
    require 'app/models/Log.php';
    //LLamada a archivo gestor de base de datos
    require 'core/Database.php';

    //Inicialización de clases necesarias en Index
    $errores = new Log();

    // Manejo de Errores Personalizado de PHP a Try/Catch
    function exception_error_handler($severidad, $mensaje, $fichero, $linea) {
        $cadena =  '[LEVEL]: ' . $severidad . ' IN ' . $fichero . ': ' . $linea . '[MESSAGGE]' . $mensaje . "\n";
        $guardar = new Log();
        $guardar->insert($cadena, "Excepcion No Manejada");
        //echo $cadena;
    }

    //Para manejo de caracteres
    header("Content-Type: text/html;charset=utf-8");
    //Especificar el manejo de errores personalizados
    set_error_handler("exception_error_handler");
    //Inicio de Sesion
    session_start();

    //Inicio de Código de Verificación de Permisos

    //Captura de Datos para Obtener el Controlador y la Accion
    //Por Aquí Pasan Todas Las Funciones Para La Lectura de Vistas
    if(isset($_GET['c'])){
        //Aqui se recibe el controlador, si es que no está declarado
        $controlador = $_GET['c'];
    } else {
        //Si No Hay Controlador Declarado, Se Hace Validación

        //Esta Parte Del Código Es Para Software Que Sólo Funcionan Con Usuarios Registrados
        if(isset($_SESSION['ru'])){
            //Si Entra Aquí, Es Porque Hay Una Sesión Iniciada
            $controlador = "Votacion";
        } else {
            $controlador = "Votacion";
        }
        //Esta Parte Del Código Es Para Software Que Tienes Varias Vistas Libres Para Varios Usuarios
        //$controlador = "Index";
    }
    $controlador = trim(ucfirst($controlador));
    //Para colocar en el title del sitio web
    $_SESSION['cabecera'] = $controlador;

    //Obtencion de Datos de Accion, Si No Hay Una Declarada, Se Pone "Index" Por Defecto
    $accion = $_GET['a'] ?? "index";
    $accion = trim(strtolower($accion));

    //Capturar la accion para el header de la web
    $_SESSION['vista'] = $accion;
    //Variable Usada Para Declarar La Funcion En Caso De Error
    $function_action = $controlador . "|" . $accion;

    //Verificar existencia de los archivos
    $archivo = 'app/controllers/' . $controlador . 'Controller.php';
    //Verifica Si El Archivo Existe
    if(file_exists($archivo)){
        //Variable Para Determinar Si Procede O No La Petición
        $autorizado = false;

        $autorizado = true;
        $permiso = 1;
        if($autorizado && $permiso == 1){
            try{
                //Entra Aquí Si La Clase Y La Funcion Existen
                require $archivo;
                $clase = sprintf('%sController', $controlador);
                $controller = new $clase;
                $controller->$accion();

                //Eliminación de Variables de Sesión Para Manejo de Menú
                unset($_SESSION['accion']);
                unset($_SESSION['controlador']);
                unset($_SESSION['accionnav']);
                unset($_SESSION['icono']);
            } catch (\Throwable $e){
                //Si La Funcion No Existe, Entra Aquí.
                require 'app/controllers/ErrorController.php';
                $clase = sprintf('%sController', 'Error');
                $accion = 'error';
                $controller = new $clase;
                $controller->$accion();
                $errores->insert($e->getMessage(), $function_action);
            }
        } else {
            //Si La Funcion No Existe, Entra Aquí.
            require 'app/controllers/ErrorController.php';
            $clase = sprintf('%sController', 'Error');
            $accion = 'error';
            $controller = new $clase;
            $controller->$accion();
            $errores->insert($e->getMessage(), $function_action);
        }
    } else {
        //Si el Archivo No Existe, Genera El Error Y Notifica En La Pantalla
        require 'app/controllers/ErrorController.php';
        $clase = sprintf('%sController', 'Error');
        $accion = 'error';
        $controller = new $clase;
        $controller->$accion();
        //Acciones si el archivo no existe
        //Automaticamente, notificar error
        $errores->insert("ACCESO A CONTROLADOR NO EXISTENTE", $function_action);
    }
} catch (Exception $e){
    //Error en Try/Catch
    require 'app/controllers/ErrorController.php';
    $clase = sprintf('%sController', 'Error');
    $accion = 'error';
    $controller = new $clase;
    $controller->$accion();
    //Acciones si el archivo no existe
    //Automaticamente, notificar error
    $errores->insert("ERROR EN MANEJO DE ERRORES", $function_action);
}

