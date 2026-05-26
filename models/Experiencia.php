<?php
class Experiencia
{
    private $id_experiencia;
    private $fecha_ini;
    private $fecha_fin;
    private $cargo;
    private $empresa;
    private $descripcion_funciones;
    private $nro_doc_persona;

    public function __construct($id_experiencia, $fecha_ini, $fecha_fin, $cargo, $empresa, $descripcion_funciones, $nro_doc_persona)
    {
        $this->setIdExperiencia($id_experiencia);
        $this->setFechaIni($fecha_ini);
        $this->setFechaFin($fecha_fin);
        $this->setCargo($cargo);
        $this->setEmpresa($empresa);
        $this->setDescripcionFunciones($descripcion_funciones);
        $this->setNroDocPersona($nro_doc_persona);
    }

    // Getters
    public function getIdExperiencia()
    {
        return $this->id_experiencia;
    }
    public function getFechaIni()
    {
        return $this->fecha_ini;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }
    public function getCargo()
    {
        return $this->cargo;
    }
    public function getEmpresa()
    {
        return $this->empresa;
    }
    public function getDescripcionFunciones()
    {
        return $this->descripcion_funciones;
    }
    public function getNroDocPersona()
    {
        return $this->nro_doc_persona;
    }

    // Setters
    public function setIdExperiencia($id_experiencia)
    {
        $this->id_experiencia = $id_experiencia;
    }
    public function setFechaIni($fecha_ini)
    {
        $this->fecha_ini = $fecha_ini;
    }
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
    public function setDescripcionFunciones($descripcion_funciones)
    {
        $this->descripcion_funciones = $descripcion_funciones;
    }
    public function setNroDocPersona($nro_doc_persona)
    {
        $this->nro_doc_persona = $nro_doc_persona;
    }

    // CRUD Operations
    public static function save($experiencia)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO experiencia VALUES (NULL, :fecha_ini, :fecha_fin, :cargo, :empresa, :descripcion_funciones, :nro_doc_persona)');
        $insert->bindValue('fecha_ini', $experiencia->getFechaIni());
        $insert->bindValue('fecha_fin', $experiencia->getFechaFin());
        $insert->bindValue('cargo', $experiencia->getCargo());
        $insert->bindValue('empresa', $experiencia->getEmpresa());
        $insert->bindValue('descripcion_funciones', $experiencia->getDescripcionFunciones());
        $insert->bindValue('nro_doc_persona', $experiencia->getNroDocPersona());
        $insert->execute();
    }

    public static function all()
    {
        $db = Db::getConnect();
        $listaExperiencia = [];
        $select = $db->query('SELECT * FROM experiencia ORDER BY id_experiencia');
        foreach ($select->fetchAll() as $exp) {
            $listaExperiencia[] = new Experiencia($exp['id_experiencia'], $exp['fecha_ini'], $exp['fecha_fin'], $exp['cargo'], $exp['empresa'], $exp['descripcion_funciones'], $exp['nro_doc_persona']);
        }
        return $listaExperiencia;
    }

    public static function search($busqueda, $nro_doc_persona)
    {
        $db = Db::getConnect();
        $select = $db->prepare("SELECT * FROM experiencia 
                            WHERE nro_doc_persona = :nro_doc_persona
                              AND (id_experiencia LIKE :busqueda
                                OR cargo LIKE :busqueda
                                OR empresa LIKE :busqueda)");
        $select->bindValue('nro_doc_persona', $nro_doc_persona);
        $select->bindValue('busqueda', '%' . $busqueda . '%');
        $select->execute();

        $lista = [];
        foreach ($select->fetchAll() as $exp) {
            $lista[] = new Experiencia($exp['id_experiencia'], $exp['fecha_ini'], $exp['fecha_fin'], $exp['cargo'], $exp['empresa'], $exp['descripcion_funciones'], $exp['nro_doc_persona']);
        }
        return $lista;
    }

    public static function searchById($id_experiencia)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM experiencia WHERE id_experiencia = :id_experiencia');
        $select->bindValue('id_experiencia', $id_experiencia);
        $select->execute();
        $experienciaDb = $select->fetch();
        return new Experiencia($experienciaDb['id_experiencia'], $experienciaDb['fecha_ini'], $experienciaDb['fecha_fin'], $experienciaDb['cargo'], $experienciaDb['empresa'], $experienciaDb['descripcion_funciones'], $experienciaDb['nro_doc_persona']);
    }

    public static function searchByPersona($nro_doc_persona)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM experiencia WHERE nro_doc_persona = :nro_doc_persona');
        $select->bindValue('nro_doc_persona', $nro_doc_persona);
        $select->execute();

        $experiencias = [];
        foreach ($select->fetchAll() as $exp) {
            $experiencias[] = new Experiencia($exp['id_experiencia'], $exp['fecha_ini'], $exp['fecha_fin'], $exp['cargo'], $exp['empresa'], $exp['descripcion_funciones'], $exp['nro_doc_persona']);
        }
        return $experiencias;
    }

    public static function update($experiencia)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE experiencia SET fecha_ini = :fecha_ini, fecha_fin = :fecha_fin, cargo = :cargo, empresa = :empresa, descripcion_funciones = :descripcion_funciones, nro_doc_persona = :nro_doc_persona WHERE id_experiencia = :id_experiencia');
        $update->bindValue('fecha_ini', $experiencia->getFechaIni());
        $update->bindValue('fecha_fin', $experiencia->getFechaFin());
        $update->bindValue('cargo', $experiencia->getCargo());
        $update->bindValue('empresa', $experiencia->getEmpresa());
        $update->bindValue('descripcion_funciones', $experiencia->getDescripcionFunciones());
        $update->bindValue('nro_doc_persona', $experiencia->getNroDocPersona());
        $update->bindValue('id_experiencia', $experiencia->getIdExperiencia());
        $update->execute();
    }

    public static function delete($id_experiencia)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM experiencia WHERE id_experiencia = :id_experiencia');
        $delete->bindValue('id_experiencia', $id_experiencia);
        $delete->execute();
    }
}
?>