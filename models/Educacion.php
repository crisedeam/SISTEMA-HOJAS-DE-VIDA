<?php
class Educacion
{
    private $id_estudio;
    private $fecha_ini;
    private $fecha_fin;
    private $titulo_estudio;
    private $entidad;
    private $descripcion;
    private $nro_doc_persona;

    public function __construct($id_estudio, $fecha_ini, $fecha_fin, $titulo_estudio, $entidad, $descripcion, $nro_doc_persona)
    {
        $this->setIdEstudio($id_estudio);
        $this->setFechaIni($fecha_ini);
        $this->setFechaFin($fecha_fin);
        $this->setTituloEstudio($titulo_estudio);
        $this->setEntidad($entidad);
        $this->setDescripcion($descripcion);
        $this->setNroDocPersona($nro_doc_persona);
    }

    // Getters
    public function getIdEstudio()
    {
        return $this->id_estudio;
    }
    public function getFechaIni()
    {
        return $this->fecha_ini;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }
    public function getTituloEstudio()
    {
        return $this->titulo_estudio;
    }
    public function getEntidad()
    {
        return $this->entidad;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getNroDocPersona()
    {
        return $this->nro_doc_persona;
    }

    // Setters
    public function setIdEstudio($id_estudio)
    {
        $this->id_estudio = $id_estudio;
    }
    public function setFechaIni($fecha_ini)
    {
        $this->fecha_ini = $fecha_ini;
    }
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }
    public function setTituloEstudio($titulo_estudio)
    {
        $this->titulo_estudio = $titulo_estudio;
    }
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setNroDocPersona($nro_doc_persona)
    {
        $this->nro_doc_persona = $nro_doc_persona;
    }

    // CRUD
    public static function save($educacion)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO educacion VALUES (NULL, :fecha_ini, :fecha_fin, :titulo_estudio, :entidad, :descripcion, :nro_doc_persona)');
        $insert->bindValue('fecha_ini', $educacion->getFechaIni());
        $insert->bindValue('fecha_fin', $educacion->getFechaFin());
        $insert->bindValue('titulo_estudio', $educacion->getTituloEstudio());
        $insert->bindValue('entidad', $educacion->getEntidad());
        $insert->bindValue('descripcion', $educacion->getDescripcion());
        $insert->bindValue('nro_doc_persona', $educacion->getNroDocPersona());
        $insert->execute();
    }

    public static function all()
    {
        $db = Db::getConnect();
        $listaEducacion = [];
        $select = $db->query('SELECT * FROM educacion ORDER BY id_estudio');
        foreach ($select->fetchAll() as $estudio) {
            $listaEducacion[] = new Educacion($estudio['id_estudio'], $estudio['fecha_ini'], $estudio['fecha_fin'], $estudio['titulo_estudio'], $estudio['entidad'], $estudio['descripcion'], $estudio['nro_doc_persona']);
        }
        return $listaEducacion;
    }

    public static function search($busqueda, $nro_doc_persona)
    {
        $db = Db::getConnect();
        $select = $db->prepare("SELECT * FROM educacion 
                            WHERE nro_doc_persona = :nro_doc_persona
                              AND (id_estudio LIKE :busqueda
                                OR titulo_estudio LIKE :busqueda
                                OR entidad LIKE :busqueda)");
        $select->bindValue('nro_doc_persona', $nro_doc_persona);
        $select->bindValue('busqueda', '%' . $busqueda . '%');
        $select->execute();

        $lista = [];
        foreach ($select->fetchAll() as $edu) {
            $lista[] = new Educacion($edu['id_estudio'], $edu['fecha_ini'], $edu['fecha_fin'], $edu['titulo_estudio'], $edu['entidad'], $edu['descripcion'], $edu['nro_doc_persona']);
        }
        return $lista;
    }

    public static function searchById($id_estudio)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM educacion WHERE id_estudio = :id_estudio');
        $select->bindValue('id_estudio', $id_estudio);
        $select->execute();
        $estudio = $select->fetch();
        return new Educacion($estudio['id_estudio'], $estudio['fecha_ini'], $estudio['fecha_fin'], $estudio['titulo_estudio'], $estudio['entidad'], $estudio['descripcion'], $estudio['nro_doc_persona']);
    }

    public static function searchByPersona($nro_doc_persona)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM educacion WHERE nro_doc_persona = :nro_doc_persona');
        $select->bindValue('nro_doc_persona', $nro_doc_persona);
        $select->execute();

        $educaciones = [];
        foreach ($select->fetchAll() as $row) {
            $educaciones[] = new Educacion($row['id_estudio'], $row['fecha_ini'], $row['fecha_fin'], $row['titulo_estudio'], $row['entidad'], $row['descripcion'], $row['nro_doc_persona']);
        }
        return $educaciones;
    }

    public static function update($educacion)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE educacion SET fecha_ini = :fecha_ini, fecha_fin = :fecha_fin, titulo_estudio = :titulo_estudio, entidad = :entidad, descripcion = :descripcion, nro_doc_persona = :nro_doc_persona WHERE id_estudio = :id_estudio');
        $update->bindValue('fecha_ini', $educacion->getFechaIni());
        $update->bindValue('fecha_fin', $educacion->getFechaFin());
        $update->bindValue('titulo_estudio', $educacion->getTituloEstudio());
        $update->bindValue('entidad', $educacion->getEntidad());
        $update->bindValue('descripcion', $educacion->getDescripcion());
        $update->bindValue('nro_doc_persona', $educacion->getNroDocPersona());
        $update->bindValue('id_estudio', $educacion->getIdEstudio());
        $update->execute();
    }

    public static function delete($id_estudio)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM educacion WHERE id_estudio = :id_estudio');
        $delete->bindValue('id_estudio', $id_estudio);
        $delete->execute();
    }
}
?>