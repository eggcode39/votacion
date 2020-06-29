<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 29/06/2020
 * Time: 11:36
 */
require 'app/models/Votacion.php';
class VotacionController{
    private $log;
    private $votacion;
    public function __construct()
    {
        $this->log = new Log();
        $this->votacion = new Votacion();
    }
    //Vistas
    public function index(){
        try{
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'votacion/index.php';
        } catch (Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
        }
    }

    public function votar(){
        try{
            if(isset($_GET['id'])){
                $votante = $this->votacion->listar_votante($_GET['id']);
                if(isset($votante->id_votante)){
                    if($votante->votante_estado == 0){
                        $votantes = $this->votacion->listar_candidatos();
                    } else {
                        throw new Exception('Votante Ya Emitió Voto');
                    }
                } else {
                    throw new Exception('Votante No Existe');
                }
            } else {
                throw new Exception('DNI NO DECLARADO');
            }

            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'votacion/votar.php';
        } catch (Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            echo "<script language=\"javascript\">alert(\"".$e->getMessage()."\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
        }
    }

    public function resultados(){
        try{
            $votaciones = $this->votacion->listar_votos();
            $votaron = $this->votacion->listar_total_votaron();
            $faltan = $this->votacion->listar_total_no_votaron();
            $total_votantes = $this->votacion->listar_total_habilitados_voto();
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'votacion/resultados.php';
        } catch (Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
        }
    }

    public function faltantes(){
        try{
            $votantes = $this->votacion->listar_no_votaron();
            $faltan = $this->votacion->listar_total_no_votaron();
            require _VIEW_PATH_ . 'header.php';
            require _VIEW_PATH_ . 'votacion/faltantes.php';
        } catch (Throwable $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            echo "<script language=\"javascript\">alert(\"Error Al Mostrar Contenido. Redireccionando Al Inicio\");</script>";
            echo "<script language=\"javascript\">window.location.href=\"". _SERVER_ ."\";</script>";
        }
    }
    //Funciones
    public function verificar_votante(){
        $message = 'OK';
        try{
            $votante = $this->votacion->listar_votante($_POST['dni']);
            if(isset($votante->id_votante) && $votante->votante_estado == 0){
                $result = 1;
            } else {
                $result = 2;
            }
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
            $message = "Code 2: General Error";
        }
        $response = array("code" => $result,"message" => $message);
        $data = array("result" => $response);
        echo json_encode($data);
    }

    public function registrar_voto(){
        try{
            $message = 'OK';
            $votante = $this->votacion->listar_votante($_POST['dni']);
            if(isset($votante->id_votante)){
                $voto = $this->votacion->listar_votante_nombre($_POST['voto']);
                if(isset($voto->id_votante)){
                    $result = $this->votacion->insertar_voto($_POST['voto']);
                    if($result == 1){
                        $this->votacion->actualizar_votante($_POST['dni']);
                        $this->log->insert('El votante con DNI: ' . $_POST['dni'] . ' ha emitido su voto.', 'VOTO');
                    }
                } else {
                    $result = 2;
                }
            } else {
                $result = 2;
            }
        } catch (Exception $e){
            $this->log->insert($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            $result = 2;
            $message = "Code 2: General Error";
        }
        $response = array("code" => $result,"message" => $message);
        $data = array("result" => $response);
        echo json_encode($data);
    }

}
