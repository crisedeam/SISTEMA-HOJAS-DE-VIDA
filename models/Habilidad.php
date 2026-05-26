<?php
class Habilidad
{
    private $id_habilidad;
    private $nombre;
    private $rango;

    public function __construct($id_habilidad, $nombre, $rango)
    {
        $this->id_habilidad = $id_habilidad;
        $this->nombre = $nombre;
        $this->rango = $rango;
    }

    // Getters
    public function getIdHabilidad()
    {
        return $this->id_habilidad;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getRango()
    {
        return $this->rango;
    }

    // Setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setRango($rango)
    {
        $this->rango = $rango;
    }

    // CRUD Operations
    public static function save($habilidad)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO habilidad VALUES (NULL, :nombre, :rango)');
        $insert->bindValue('nombre', $habilidad->getNombre());
        $insert->bindValue('rango', $habilidad->getRango());
        $insert->execute();
    }

    public static function all()
    {
        $db = Db::getConnect();
        $listaHabilidades = [];
        $select = $db->query('SELECT * FROM habilidad ORDER BY id_habilidad');
        foreach ($select->fetchAll() as $habilidad) {
            $listaHabilidades[] = new Habilidad($habilidad['id_habilidad'], $habilidad['nombre'], $habilidad['rango']);
        }
        return $listaHabilidades;
    }

    public static function searchById($id_habilidad)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM habilidad WHERE id_habilidad = :id_habilidad');
        $select->bindValue('id_habilidad', $id_habilidad);
        $select->execute();
        $habilidadDb = $select->fetch();
        return new Habilidad($habilidadDb['id_habilidad'], $habilidadDb['nombre'], $habilidadDb['rango']);
    }

    public static function update($habilidad)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE habilidad SET nombre = :nombre, rango = :rango WHERE id_habilidad = :id_habilidad');
        $update->bindValue('nombre', $habilidad->getNombre());
        $update->bindValue('rango', $habilidad->getRango());
        $update->bindValue('id_habilidad', $habilidad->getIdHabilidad());
        $update->execute();
    }

    public static function delete($id_habilidad)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM habilidad WHERE id_habilidad = :id_habilidad');
        $delete->bindValue('id_habilidad', $id_habilidad);
        $delete->execute();
    }
}
?>