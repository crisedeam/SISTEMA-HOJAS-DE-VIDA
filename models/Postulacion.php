<?php
class Postulacion
{
    private $pers_id;
    private $vac_id;
    private $estado;
    private $observaciones;
    private $fecha_postulacion;

    public function __construct($pers_id, $vac_id, $estado, $observaciones, $fecha_postulacion)
    {
        $this->setPersId($pers_id);
        $this->setVacId($vac_id);
        $this->setEstado($estado);
        $this->setObservaciones($observaciones);
        $this->setFechaPostulacion($fecha_postulacion);
    }

    // Getters
    public function getPersId()
    {
        return $this->pers_id;
    }
    public function getVacId()
    {
        return $this->vac_id;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getObservaciones()
    {
        return $this->observaciones;
    }
    public function getFechaPostulacion()
    {
        return $this->fecha_postulacion;
    }

    // Setters
    public function setPersId($pers_id)
    {
        $this->pers_id = $pers_id;
    }
    public function setVacId($vac_id)
    {
        $this->vac_id = $vac_id;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }
    public function setFechaPostulacion($fecha_postulacion)
    {
        $this->fecha_postulacion = $fecha_postulacion;
    }

    // CRUD Operations
    public static function save($postulacion)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO postulacion VALUES (:pers_id, :vac_id, :estado, :observaciones, :fecha_postulacion)');
        $insert->bindValue('pers_id', $postulacion->getPersId());
        $insert->bindValue('vac_id', $postulacion->getVacId());
        $insert->bindValue('estado', $postulacion->getEstado());
        $insert->bindValue('observaciones', $postulacion->getObservaciones());
        $insert->bindValue('fecha_postulacion', $postulacion->getFechaPostulacion());
        $insert->execute();
    }

    // Verifica si la persona ya está postulada a esa vacante
    public static function exists($pers_id, $vac_id)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT COUNT(*) as total FROM postulacion WHERE pers_id = :pers_id AND vac_id = :vac_id');
        $select->bindValue('pers_id', $pers_id);
        $select->bindValue('vac_id', $vac_id);
        $select->execute();
        $result = $select->fetch();

        return $result['total'] > 0; // true si ya existe
    }


    public static function all()
    {
        $db = Db::getConnect();
        $listaPostulaciones = [];
        $select = $db->query('SELECT * FROM postulacion ORDER BY pers_id, vac_id');
        foreach ($select->fetchAll() as $postulacion) {
            $listaPostulaciones[] = new Postulacion($postulacion['pers_id'], $postulacion['vac_id'], $postulacion['estado'], $postulacion['observaciones'], $postulacion['fecha_postulacion']);
        }
        return $listaPostulaciones;
    }

    public static function searchById($pers_id, $vac_id)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM postulacion WHERE pers_id = :pers_id AND vac_id = :vac_id');
        $select->bindValue('pers_id', $pers_id);
        $select->bindValue('vac_id', $vac_id);
        $select->execute();
        $postulacionDb = $select->fetch();
        return new Postulacion($postulacionDb['pers_id'], $postulacionDb['vac_id'], $postulacionDb['estado'], $postulacionDb['observaciones'], $postulacionDb['fecha_postulacion']);
    }

    // Devuelve solo las postulaciones de una persona
    public static function getByPersona($pers_id)
    {
        $db = Db::getConnect();
        $listaPostulaciones = [];
        $select = $db->prepare('SELECT * FROM postulacion WHERE pers_id = :pers_id ORDER BY fecha_postulacion DESC');
        $select->bindValue('pers_id', $pers_id);
        $select->execute();

        foreach ($select->fetchAll() as $post) {
            $listaPostulaciones[] = new Postulacion(
                $post['pers_id'],
                $post['vac_id'],
                $post['estado'],
                $post['observaciones'],
                $post['fecha_postulacion']
            );
        }
        return $listaPostulaciones;
    }

    // Devuelve solo las postulaciones a las vacantes de una empresa
    public static function getByEmpresa($empr_id)
    {
        $db = Db::getConnect();
        $listaPostulaciones = [];
        $select = $db->prepare(
            'SELECT p.*
         FROM postulacion p
         INNER JOIN vacante v ON p.vac_id = v.vacant_id
         WHERE v.empr_id = :empr_id
         ORDER BY p.fecha_postulacion DESC'
        );
        $select->bindValue('empr_id', $empr_id);
        $select->execute();

        foreach ($select->fetchAll() as $post) {
            $listaPostulaciones[] = new Postulacion(
                $post['pers_id'],
                $post['vac_id'],
                $post['estado'],
                $post['observaciones'],
                $post['fecha_postulacion']
            );
        }
        return $listaPostulaciones;
    }


    public static function update($postulacion)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE postulacion SET estado = :estado, observaciones = :observaciones, fecha_postulacion = :fecha_postulacion WHERE pers_id = :pers_id AND vac_id = :vac_id');
        $update->bindValue('estado', $postulacion->getEstado());
        $update->bindValue('observaciones', $postulacion->getObservaciones());
        $update->bindValue('fecha_postulacion', $postulacion->getFechaPostulacion());
        $update->bindValue('pers_id', $postulacion->getPersId());
        $update->bindValue('vac_id', $postulacion->getVacId());
        $update->execute();
    }

    public static function delete($pers_id, $vac_id)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM postulacion WHERE pers_id = :pers_id AND vac_id = :vac_id');
        $delete->bindValue('pers_id', $pers_id);
        $delete->bindValue('vac_id', $vac_id);
        $delete->execute();
    }
}
?>