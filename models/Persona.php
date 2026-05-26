<?php
class Persona
{
    private $nro_documento;
    private $tipo_documento;
    private $foto;
    private $nombres;
    private $apellidos;
    private $fecha_nacimiento;
    private $direccion_residencia;
    private $ciudad_residencia;
    private $correo_electronico;
    private $telefono;
    private $password;
    private $sexo;
    private $hab1;
    private $hab2;
    private $hab3;

    public function __construct($nro_documento, $tipo_documento, $foto, $nombres, $apellidos, $fecha_nacimiento, $direccion_residencia, $ciudad_residencia, $correo_electronico, $telefono, $password, $sexo, $hab1, $hab2, $hab3)
    {
        $this->setNroDocumento($nro_documento);
        $this->setTipoDocumento($tipo_documento);
        $this->setFoto($foto);
        $this->setNombres($nombres);
        $this->setApellidos($apellidos);
        $this->setFechaNacimiento($fecha_nacimiento);
        $this->setDireccionResidencia($direccion_residencia);
        $this->setCiudadResidencia($ciudad_residencia);
        $this->setCorreoElectronico($correo_electronico);
        $this->setTelefono($telefono);
        $this->setPassword($password);
        $this->setSexo($sexo);
        $this->setHab1($hab1);
        $this->setHab2($hab2);
        $this->setHab3($hab3);
    }

    // Getters
    public function getNroDocumento()
    {
        return $this->nro_documento;
    }
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }
    public function getFoto()
    {
        return $this->foto;
    }
    public function getNombres()
    {
        return $this->nombres;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }
    public function getDireccionResidencia()
    {
        return $this->direccion_residencia;
    }
    public function getCiudadResidencia()
    {
        return $this->ciudad_residencia;
    }
    public function getCorreoElectronico()
    {
        return $this->correo_electronico;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function getHab1()
    {
        return $this->hab1;
    }
    public function getHab2()
    {
        return $this->hab2;
    }
    public function getHab3()
    {
        return $this->hab3;
    }

    // Setters
    public function setNroDocumento($nro_documento)
    {
        $this->nro_documento = $nro_documento;
    }
    public function setTipoDocumento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    public function setDireccionResidencia($direccion_residencia)
    {
        $this->direccion_residencia = $direccion_residencia;
    }
    public function setCiudadResidencia($ciudad_residencia)
    {
        $this->ciudad_residencia = $ciudad_residencia;
    }
    public function setCorreoElectronico($correo_electronico)
    {
        $this->correo_electronico = $correo_electronico;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    public function setHab1($hab1)
    {
        $this->hab1 = $hab1;
    }
    public function setHab2($hab2)
    {
        $this->hab2 = $hab2;
    }
    public function setHab3($hab3)
    {
        $this->hab3 = $hab3;
    }

    // CRUD Operations
    public static function save($persona)
    {
        $db = Db::getConnect();

        $insert = $db->prepare('INSERT INTO persona VALUES (:nro_documento, :tipo_documento, :foto, :nombres, :apellidos, :fecha_nacimiento, 
        :direccion_residencia, :ciudad_residencia, :correo_electronico, :telefono, :password, :sexo, :hab1, :hab2, :hab3)');
        $insert->bindValue('nro_documento', $persona->getNroDocumento());
        $insert->bindValue('tipo_documento', $persona->getTipoDocumento());
        $insert->bindValue('foto', $persona->getFoto());
        $insert->bindValue('nombres', $persona->getNombres());
        $insert->bindValue('apellidos', $persona->getApellidos());
        $insert->bindValue('fecha_nacimiento', $persona->getFechaNacimiento());
        $insert->bindValue('direccion_residencia', $persona->getDireccionResidencia());
        $insert->bindValue('ciudad_residencia', $persona->getCiudadResidencia());
        $insert->bindValue('correo_electronico', $persona->getCorreoElectronico());
        $insert->bindValue('telefono', $persona->getTelefono());
        $insert->bindValue('password', $persona->getPassword());
        $insert->bindValue('sexo', $persona->getSexo());
        $insert->bindValue('hab1', $persona->getHab1());
        $insert->bindValue('hab2', $persona->getHab2());
        $insert->bindValue('hab3', $persona->getHab3());
        $insert->execute();

    }

    public static function all()
    {
        $db = Db::getConnect();
        $listaPersona = [];
        $select = $db->query('SELECT * FROM persona order by nro_documento');
        foreach ($select->fetchAll() as $persona) {
            $listaPersona[] = new Persona(
                $persona['nro_documento'],
                $persona['tipo_documento'],
                $persona['foto'],
                $persona['nombres'],
                $persona['apellidos'],
                $persona['fecha_nacimiento'],
                $persona['direccion_residencia'],
                $persona['ciudad_residencia'],
                $persona['correo_electronico'],
                $persona['telefono'],
                $persona['password'],
                $persona['sexo'],
                $persona['hab1'],
                $persona['hab2'],
                $persona['hab3']
            );
        }
        return $listaPersona;
    }

    public static function searchByNroDocumento($nro_documento)
    {
        $db = Db::getConnect();

        $select = $db->prepare('SELECT * FROM persona WHERE nro_documento=:nro_documento');
        $select->bindValue('nro_documento', $nro_documento);
        $select->execute();

        $personaDB = $select->fetch();

        if ($personaDB) {
            return new Persona(
                $personaDB['nro_documento'],
                $personaDB['tipo_documento'],
                $personaDB['foto'],
                $personaDB['nombres'],
                $personaDB['apellidos'],
                $personaDB['fecha_nacimiento'],
                $personaDB['direccion_residencia'],
                $personaDB['ciudad_residencia'],
                $personaDB['correo_electronico'],
                $personaDB['telefono'],
                $personaDB['password'],
                $personaDB['sexo'],
                $personaDB['hab1'],
                $personaDB['hab2'],
                $personaDB['hab3']
            );
        } else {
            return null;
        }

    }

    public static function searchByCorreo($correo)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM persona WHERE correo_electronico = :correo LIMIT 1');
        $select->bindValue('correo', $correo);
        $select->execute();
        $personaDB = $select->fetch();

        if ($personaDB) {
            return new Persona(
                $personaDB['nro_documento'],
                $personaDB['tipo_documento'],
                $personaDB['foto'],
                $personaDB['nombres'],
                $personaDB['apellidos'],
                $personaDB['fecha_nacimiento'],
                $personaDB['direccion_residencia'],
                $personaDB['ciudad_residencia'],
                $personaDB['correo_electronico'],
                $personaDB['telefono'],
                $personaDB['password'],
                $personaDB['sexo'],
                $personaDB['hab1'],
                $personaDB['hab2'],
                $personaDB['hab3']
            );

        } else {
            return null;
        }
    }



    public static function update($persona)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE persona SET  foto=:foto, nombres=:nombres, apellidos=:apellidos, fecha_nacimiento=:fecha_nacimiento, 
        direccion_residencia=:direccion_residencia, ciudad_residencia=:ciudad_residencia, correo_electronico=:correo_electronico, 
        telefono=:telefono, password=:password, sexo=:sexo, hab1=:hab1, hab2=:hab2, hab3=:hab3 WHERE nro_documento=:nro_documento');
        $update->bindValue('foto', $persona->getFoto());
        $update->bindValue('nombres', $persona->getNombres());
        $update->bindValue('apellidos', $persona->getApellidos());
        $update->bindValue('fecha_nacimiento', $persona->getFechaNacimiento());
        $update->bindValue('direccion_residencia', $persona->getDireccionResidencia());
        $update->bindValue('ciudad_residencia', $persona->getCiudadResidencia());
        $update->bindValue('correo_electronico', $persona->getCorreoElectronico());
        $update->bindValue('telefono', $persona->getTelefono());
        $update->bindValue('password', $persona->getPassword());
        $update->bindValue('sexo', $persona->getSexo());
        $update->bindValue('hab1', $persona->getHab1());
        $update->bindValue('hab2', $persona->getHab2());
        $update->bindValue('hab3', $persona->getHab3());
        $update->bindValue('nro_documento', $persona->getNroDocumento());
        $update->execute();
    }

    public static function delete($nro_documento)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM persona WHERE nro_documento=:nro_documento');
        $delete->bindValue('nro_documento', $nro_documento);
        $delete->execute();
    }

}

?>