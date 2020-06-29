<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 29/06/2020
 * Time: 11:53
 */
class Votacion
{
    private $pdo;
    private $log;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }
    //Listar Contenido de Página
    public function listar_votante($id)
    {
        try {
            $sql = 'select * from votantes where votante_dni = ?';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id]);
            $result = $stm->fetch();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

    public function listar_votante_nombre($nombre)
    {
        try {
            $sql = 'select * from votantes where votante_nombre = ?';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$nombre]);
            $result = $stm->fetch();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

    //Listar Contenido de Página
    public function listar_votantes()
    {
        try {
            $sql = 'select * from votantes';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

    public function listar_candidatos()
    {
        try {
            $sql = 'select * from votantes where votante_opcion = 1';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

    public function insertar_voto($nombre){
        try {
            $sql = 'insert into votacion (votacion_nombre, votacion_votos) values (?,?)';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([
                $nombre,1
            ]);
            $result = 1;
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = 2;
        }
        return $result;
    }

    public function listar_votos()
    {
        try {
            $sql = 'select votacion_nombre, count(votacion_nombre) total from votacion group by votacion_nombre';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

    //Listar Contenido de Página
    public function actualizar_votante($dni)
    {
        try {
            $sql = 'update votantes set votante_estado = 1 where votante_dni = ?';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$dni]);
            $result = 1;
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = 2;
        }
        return $result;
    }

    public function listar_total_habilitados_voto()
    {
        try {
            $sql = 'select count(id_votante) total from votantes';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetch();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

    public function listar_total_votaron()
    {
        try {
            $sql = 'select count(id_votante) total from votantes where votante_estado = 1';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetch();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

    public function listar_total_no_votaron()
    {
        try {
            $sql = 'select count(id_votante) total from votantes where votante_estado = 0';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetch();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

    public function listar_no_votaron()
    {
        try {
            $sql = 'select * from votantes where votante_estado = 0';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
        } catch (Exception $e) {
            $this->log->insert($e->getMessage(), get_class($this) . '|' . __FUNCTION__);
            $result = [];
        }
        return $result;
    }

}
