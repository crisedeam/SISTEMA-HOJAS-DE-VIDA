<?php
class Vacante
{
    private $vacant_id;
    private $empr_id;
    private $cargo;
    private $desc_cargo;
    private $nro_vacantes;
    private $requisitos;
    private $exp_requerida;
    private $tipo_vinculo;
    private $ubicacion;
    private $salario;
    private $fecha_cierre;

    public function __construct($vacant_id, $empr_id, $cargo, $desc_cargo, $nro_vacantes, $requisitos, $exp_requerida, $tipo_vinculo, $ubicacion, $salario, $fecha_cierre)
    {
        $this->setVacantId($vacant_id);
        $this->setEmprId($empr_id);
        $this->setCargo($cargo);
        $this->setDescCargo($desc_cargo);
        $this->setNroVacantes($nro_vacantes);
        $this->setRequisitos($requisitos);
        $this->setExpRequerida($exp_requerida);
        $this->setTipoVinculo($tipo_vinculo);
        $this->setUbicacion($ubicacion);
        $this->setSalario($salario);
        $this->setFechaCierre($fecha_cierre);
    }

    // Getters
    public function getVacantId()
    {
        return $this->vacant_id;
    }
    public function getEmprId()
    {
        return $this->empr_id;
    }
    public function getCargo()
    {
        return $this->cargo;
    }
    public function getDescCargo()
    {
        return $this->desc_cargo;
    }
    public function getNroVacantes()
    {
        return $this->nro_vacantes;
    }
    public function getRequisitos()
    {
        return $this->requisitos;
    }
    public function getExpRequerida()
    {
        return $this->exp_requerida;
    }
    public function getTipoVinculo()
    {
        return $this->tipo_vinculo;
    }
    public function getUbicacion()
    {
        return $this->ubicacion;
    }
    public function getSalario()
    {
        return $this->salario;
    }
    public function getFechaCierre()
    {
        return $this->fecha_cierre;
    }

    // Setters
    public function setVacantId($vacant_id)
    {
        $this->vacant_id = $vacant_id;
    }
    public function setEmprId($empr_id)
    {
        $this->empr_id = $empr_id;
    }
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
    public function setDescCargo($desc_cargo)
    {
        $this->desc_cargo = $desc_cargo;
    }
    public function setNroVacantes($nro_vacantes)
    {
        $this->nro_vacantes = $nro_vacantes;
    }
    public function setRequisitos($requisitos)
    {
        $this->requisitos = $requisitos;
    }
    public function setExpRequerida($exp_requerida)
    {
        $this->exp_requerida = $exp_requerida;
    }
    public function setTipoVinculo($tipo_vinculo)
    {
        $this->tipo_vinculo = $tipo_vinculo;
    }
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }
    public function setSalario($salario)
    {
        $this->salario = $salario;
    }
    public function setFechaCierre($fecha_cierre)
    {
        $this->fecha_cierre = $fecha_cierre;
    }

    // CRUD Operations
    public static function save($vacante)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO vacante VALUES (null, :empr_id, :cargo, :desc_cargo, :nro_vacantes, :requisitos, :exp_requerida, :tipo_vinculo, :ubicacion, :salario, :fecha_cierre)');
        $insert->bindValue('empr_id', $vacante->getEmprId());
        $insert->bindValue('cargo', $vacante->getCargo());
        $insert->bindValue('desc_cargo', $vacante->getDescCargo());
        $insert->bindValue('nro_vacantes', $vacante->getNroVacantes());
        $insert->bindValue('requisitos', $vacante->getRequisitos());
        $insert->bindValue('exp_requerida', $vacante->getExpRequerida());
        $insert->bindValue('tipo_vinculo', $vacante->getTipoVinculo());
        $insert->bindValue('ubicacion', $vacante->getUbicacion());
        $insert->bindValue('salario', $vacante->getSalario());
        $insert->bindValue('fecha_cierre', $vacante->getFechaCierre());
        $insert->execute();
    }

    public static function all()
    {
        $db = Db::getConnect();
        $listaVacantes = [];
        $select = $db->query('SELECT * FROM vacante ORDER BY vacant_id');
        foreach ($select->fetchAll() as $vacante) {
            $listaVacantes[] = new Vacante($vacante['vacant_id'], $vacante['empr_id'], $vacante['cargo'], $vacante['desc_cargo'], $vacante['nro_vacantes'], $vacante['requisitos'], $vacante['exp_requerida'], $vacante['tipo_vinculo'], $vacante['ubicacion'], $vacante['salario'], $vacante['fecha_cierre']);
        }
        return $listaVacantes;
    }

    public static function search($busqueda, $empr_id = null)
{
    $db = Db::getConnect();

    if ($empr_id) {
        $select = $db->prepare("SELECT * FROM vacante 
            WHERE empr_id = :empr_id
              AND (cargo LIKE :busqueda
              OR exp_requerida LIKE :busqueda
              OR ubicacion LIKE :busqueda
              OR salario LIKE :busqueda)");
        $select->bindValue('empr_id', $empr_id);
    } else {
        $select = $db->prepare("SELECT * FROM vacante 
            WHERE cargo LIKE :busqueda
              OR exp_requerida LIKE :busqueda
              OR ubicacion LIKE :busqueda
              OR salario LIKE :busqueda");
    }

    $select->bindValue('busqueda', '%' . $busqueda . '%');
    $select->execute();

    $lista = [];
    foreach ($select->fetchAll() as $vac) {
        $lista[] = new Vacante(
            $vac['vacant_id'],
            $vac['empr_id'],
            $vac['cargo'],
            $vac['desc_cargo'],
            $vac['nro_vacantes'],
            $vac['requisitos'],
            $vac['exp_requerida'],
            $vac['tipo_vinculo'],
            $vac['ubicacion'],
            $vac['salario'],
            $vac['fecha_cierre']
        );
    }

    return $lista;
}


    public static function searchByEmpresa($empr_id)
    {
        $db = Db::getConnect();
        $listaVacantes = [];
        $select = $db->prepare('SELECT * FROM vacante WHERE empr_id = :empr_id ORDER BY vacant_id');
        $select->bindValue('empr_id', $empr_id);
        $select->execute();

        foreach ($select->fetchAll() as $vacante) {
            $listaVacantes[] = new Vacante(
                $vacante['vacant_id'],
                $vacante['empr_id'],
                $vacante['cargo'],
                $vacante['desc_cargo'],
                $vacante['nro_vacantes'],
                $vacante['requisitos'],
                $vacante['exp_requerida'],
                $vacante['tipo_vinculo'],
                $vacante['ubicacion'],
                $vacante['salario'],
                $vacante['fecha_cierre']
            );
        }
        return $listaVacantes;
    }

    public static function searchById($vacant_id)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM vacante WHERE vacant_id = :vacant_id');
        $select->bindValue('vacant_id', $vacant_id);
        $select->execute();
        $vacanteDb = $select->fetch();
        return new Vacante($vacanteDb['vacant_id'], $vacanteDb['empr_id'], $vacanteDb['cargo'], $vacanteDb['desc_cargo'], $vacanteDb['nro_vacantes'], $vacanteDb['requisitos'], $vacanteDb['exp_requerida'], $vacanteDb['tipo_vinculo'], $vacanteDb['ubicacion'], $vacanteDb['salario'], $vacanteDb['fecha_cierre']);
    }

    public static function update($vacante)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE vacante SET empr_id = :empr_id, cargo = :cargo, desc_cargo = :desc_cargo, nro_vacantes = :nro_vacantes, requisitos = :requisitos, exp_requerida = :exp_requerida, tipo_vinculo = :tipo_vinculo, ubicacion = :ubicacion, salario = :salario, fecha_cierre = :fecha_cierre WHERE vacant_id = :vacant_id');
        $update->bindValue('empr_id', $vacante->getEmprId());
        $update->bindValue('cargo', $vacante->getCargo());
        $update->bindValue('desc_cargo', $vacante->getDescCargo());
        $update->bindValue('nro_vacantes', $vacante->getNroVacantes());
        $update->bindValue('requisitos', $vacante->getRequisitos());
        $update->bindValue('exp_requerida', $vacante->getExpRequerida());
        $update->bindValue('tipo_vinculo', $vacante->getTipoVinculo());
        $update->bindValue('ubicacion', $vacante->getUbicacion());
        $update->bindValue('salario', $vacante->getSalario());
        $update->bindValue('fecha_cierre', $vacante->getFechaCierre());
        $update->bindValue('vacant_id', $vacante->getVacantId());
        $update->execute();
    }

    public static function delete($vacant_id)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM vacante WHERE vacant_id = :vacant_id');
        $delete->bindValue('vacant_id', $vacant_id);
        $delete->execute();
    }
}
?>