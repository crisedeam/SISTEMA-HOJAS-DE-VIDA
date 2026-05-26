<?php
class Portafolio
{
    private $id_proyecto;
    private $nombre_proyecto;
    private $fecha;
    private $descripcion_proyecto;
    private $foto;
    private $link_proyecto;
    private $nro_doc_persona;

    public function __construct($id_proyecto, $nombre_proyecto, $fecha, $descripcion_proyecto, $foto, $link_proyecto, $nro_doc_persona)
    {
        $this->setIdProyecto($id_proyecto);
        $this->setNombreProyecto($nombre_proyecto);
        $this->setFecha($fecha);
        $this->setDescripcionProyecto($descripcion_proyecto);
        $this->setFoto($foto);
        $this->setLinkProyecto($link_proyecto);
        $this->setNroDocPersona($nro_doc_persona);
    }

    // Getters
    public function getIdProyecto()
    {
        return $this->id_proyecto;
    }
    public function getNombreProyecto()
    {
        return $this->nombre_proyecto;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getDescripcionProyecto()
    {
        return $this->descripcion_proyecto;
    }
    public function getFoto()
    {
        return $this->foto;
    }
    public function getLinkProyecto()
    {
        return $this->link_proyecto;
    }
    public function getNroDocPersona()
    {
        return $this->nro_doc_persona;
    }

    // Setters
    public function setIdProyecto($id_proyecto)
    {
        $this->id_proyecto = $id_proyecto;
    }
    public function setNombreProyecto($nombre_proyecto)
    {
        $this->nombre_proyecto = $nombre_proyecto;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setDescripcionProyecto($descripcion_proyecto)
    {
        $this->descripcion_proyecto = $descripcion_proyecto;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }
    public function setLinkProyecto($link_proyecto)
    {
        $this->link_proyecto = $link_proyecto;
    }
    public function setNroDocPersona($nro_doc_persona)
    {
        $this->nro_doc_persona = $nro_doc_persona;
    }

    // CRUD Operations
    public static function save($portafolio)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO portafolio VALUES (NULL, :nombre_proyecto, :fecha, :descripcion_proyecto, :foto, :link_proyecto, :nro_doc_persona)');
        $insert->bindValue('nombre_proyecto', $portafolio->getNombreProyecto());
        $insert->bindValue('fecha', $portafolio->getFecha());
        $insert->bindValue('descripcion_proyecto', $portafolio->getDescripcionProyecto());
        $insert->bindValue('foto', $portafolio->getFoto());
        $insert->bindValue('link_proyecto', $portafolio->getLinkProyecto());
        $insert->bindValue('nro_doc_persona', $portafolio->getNroDocPersona());
        $insert->execute();
    }

    public static function all()
    {
        $db = Db::getConnect();
        $listaPortafolios = [];
        $select = $db->query('SELECT * FROM portafolio ORDER BY id_proyecto');
        foreach ($select->fetchAll() as $proyecto) {
            $listaPortafolios[] = new Portafolio($proyecto['id_proyecto'], $proyecto['nombre_proyecto'], $proyecto['fecha'], $proyecto['descripcion_proyecto'], $proyecto['foto'], $proyecto['link_proyecto'], $proyecto['nro_doc_persona']);
        }
        return $listaPortafolios;
    }

    public static function search($busqueda, $nro_doc_persona)
    {
        $db = Db::getConnect();
        $select = $db->prepare("SELECT * FROM portafolio 
                                WHERE nro_doc_persona = :nro_doc_persona
                                  AND (id_proyecto LIKE :busqueda
                                    OR nombre_proyecto LIKE :busqueda
                                    OR descripcion_proyecto LIKE :busqueda)");
        $select->bindValue('nro_doc_persona', $nro_doc_persona);
        $select->bindValue('busqueda', '%' . $busqueda . '%');
        $select->execute();

        $lista = [];
        foreach ($select->fetchAll() as $proy) {
            $lista[] = new Portafolio($proy['id_proyecto'], $proy['nombre_proyecto'], $proy['fecha'], $proy['descripcion_proyecto'], $proy['foto'], $proy['link_proyecto'], $proy['nro_doc_persona']);
        }
        return $lista;
    }

    public static function searchById($id_proyecto)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM portafolio WHERE id_proyecto = :id_proyecto');
        $select->bindValue('id_proyecto', $id_proyecto);
        $select->execute();
        $portafolioDb = $select->fetch();
        return new Portafolio($portafolioDb['id_proyecto'], $portafolioDb['nombre_proyecto'], $portafolioDb['fecha'], $portafolioDb['descripcion_proyecto'], $portafolioDb['foto'], $portafolioDb['link_proyecto'], $portafolioDb['nro_doc_persona']);
    }

    public static function searchByPersona($nro_doc_persona){
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM portafolio WHERE nro_doc_persona = :nro_doc_persona');
        $select->bindValue('nro_doc_persona', $nro_doc_persona);
        $select->execute();

        $experiencias = [];
        foreach ($select->fetchAll() as $row) {
            $experiencias[] = new Portafolio($row['id_proyecto'], $row['nombre_proyecto'], $row['fecha'], $row['descripcion_proyecto'], $row['foto'], $row['link_proyecto'], $row['nro_doc_persona']);
         }
        return $experiencias;
        
    }

    public static function update($portafolio)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE portafolio SET nombre_proyecto = :nombre_proyecto, fecha = :fecha, descripcion_proyecto = :descripcion_proyecto, foto = :foto, link_proyecto = :link_proyecto, nro_doc_persona = :nro_doc_persona WHERE id_proyecto = :id_proyecto');
        $update->bindValue('nombre_proyecto', $portafolio->getNombreProyecto());
        $update->bindValue('fecha', $portafolio->getFecha());
        $update->bindValue('descripcion_proyecto', $portafolio->getDescripcionProyecto());
        $update->bindValue('foto', $portafolio->getFoto());
        $update->bindValue('link_proyecto', $portafolio->getLinkProyecto());
        $update->bindValue('nro_doc_persona', $portafolio->getNroDocPersona());
        $update->bindValue('id_proyecto', $portafolio->getIdProyecto());
        $update->execute();
    }

    public static function delete($id_proyecto)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM portafolio WHERE id_proyecto = :id_proyecto');
        $delete->bindValue('id_proyecto', $id_proyecto);
        $delete->execute();
    }
}
?>