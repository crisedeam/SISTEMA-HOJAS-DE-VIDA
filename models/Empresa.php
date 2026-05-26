<?php
class Empresa
{
    private $id_empresa;
    private $nombre_empresa;
    private $logo_foto;
    private $nombre_delegado;
    private $cargo_delegado;
    private $correo_empresa;
    private $password;
    private $telefono_empresa;
    private $pagweb_empresa;

    public function __construct($id_empresa, $nombre_empresa, $logo_foto, $nombre_delegado, $cargo_delegado, $correo_empresa, $password, $telefono_empresa, $pagweb_empresa)
    {
        $this->setIdEmpresa($id_empresa);
        $this->setNombreEmpresa($nombre_empresa);
        $this->setLogoFoto($logo_foto);
        $this->setNombreDelegado($nombre_delegado);
        $this->setCargoDelegado($cargo_delegado);
        $this->setCorreoEmpresa($correo_empresa);
        $this->setPassword($password);
        $this->setTelefonoEmpresa($telefono_empresa);
        $this->setPagwebEmpresa($pagweb_empresa);
    }

    // ================= Getters =================
    public function getIdEmpresa() { return $this->id_empresa; }
    public function getNombreEmpresa() { return $this->nombre_empresa; }
    public function getLogoFoto() { return $this->logo_foto; }
    public function getNombreDelegado() { return $this->nombre_delegado; }
    public function getCargoDelegado() { return $this->cargo_delegado; }
    public function getCorreoEmpresa() { return $this->correo_empresa; }
    public function getPassword() { return $this->password; }
    public function getTelefonoEmpresa() { return $this->telefono_empresa; }
    public function getPagwebEmpresa() { return $this->pagweb_empresa; }

    // ================= Setters =================
    public function setIdEmpresa($id_empresa) { $this->id_empresa = $id_empresa; }
    public function setNombreEmpresa($nombre_empresa) { $this->nombre_empresa = $nombre_empresa; }
    public function setLogoFoto($logo_foto) { $this->logo_foto = $logo_foto; }
    public function setNombreDelegado($nombre_delegado) { $this->nombre_delegado = $nombre_delegado; }
    public function setCargoDelegado($cargo_delegado) { $this->cargo_delegado = $cargo_delegado; }
    public function setCorreoEmpresa($correo_empresa) { $this->correo_empresa = $correo_empresa; }
    public function setPassword($password) { $this->password = $password; }
    public function setTelefonoEmpresa($telefono_empresa) { $this->telefono_empresa = $telefono_empresa; }
    public function setPagwebEmpresa($pagweb_empresa) { $this->pagweb_empresa = $pagweb_empresa; }

    // ================= CRUD =================
    public static function save($empresa)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO empresa VALUES (:id_empresa, :nombre_empresa, :logo_foto, :nombre_delegado, :cargo_delegado, :correo_empresa, :password, :telefono_empresa, :pagweb_empresa)');
        $insert->bindValue('id_empresa', $empresa->getIdEmpresa());
        $insert->bindValue('nombre_empresa', $empresa->getNombreEmpresa());
        $insert->bindValue('logo_foto', $empresa->getLogoFoto());
        $insert->bindValue('nombre_delegado', $empresa->getNombreDelegado());
        $insert->bindValue('cargo_delegado', $empresa->getCargoDelegado());
        $insert->bindValue('correo_empresa', $empresa->getCorreoEmpresa());
        $insert->bindValue('password', $empresa->getPassword());
        $insert->bindValue('telefono_empresa', $empresa->getTelefonoEmpresa());
        $insert->bindValue('pagweb_empresa', $empresa->getPagwebEmpresa());
        $insert->execute();
    }

    public static function all()
    {
        $db = Db::getConnect();
        $listaEmpresas = [];
        $select = $db->query('SELECT * FROM empresa ORDER BY id_empresa');
        foreach ($select->fetchAll() as $empresa) {
            $listaEmpresas[] = new Empresa(
                $empresa['id_empresa'],
                $empresa['nombre_empresa'],
                $empresa['logo_foto'],
                $empresa['nombre_delegado'],
                $empresa['cargo_delegado'],
                $empresa['correo_empresa'],
                $empresa['password'],
                $empresa['telefono_empresa'],
                $empresa['pagweb_empresa']
            );
        }
        return $listaEmpresas;
    }

    public static function searchById($id_empresa)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM empresa WHERE id_empresa = :id_empresa');
        $select->bindValue('id_empresa', $id_empresa);
        $select->execute();
        $empresaDb = $select->fetch();
        if ($empresaDb) {
            return new Empresa(
                $empresaDb['id_empresa'],
                $empresaDb['nombre_empresa'],
                $empresaDb['logo_foto'],
                $empresaDb['nombre_delegado'],
                $empresaDb['cargo_delegado'],
                $empresaDb['correo_empresa'],
                $empresaDb['password'],
                $empresaDb['telefono_empresa'],
                $empresaDb['pagweb_empresa']
            );
        } else {
            return null;
        }
    }

    public static function searchByCorreo($correo)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM empresa WHERE correo_empresa = :correo LIMIT 1');
        $select->bindValue('correo', $correo);
        $select->execute();
        $empresaDb = $select->fetch();

        if ($empresaDb) {
            return new Empresa(
                $empresaDb['id_empresa'],
                $empresaDb['nombre_empresa'],
                $empresaDb['logo_foto'],
                $empresaDb['nombre_delegado'],
                $empresaDb['cargo_delegado'],
                $empresaDb['correo_empresa'],
                $empresaDb['password'],
                $empresaDb['telefono_empresa'],
                $empresaDb['pagweb_empresa']
            );
        } else {
            return null;
        }
    }

    public static function update($empresa)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE empresa 
            SET nombre_empresa = :nombre_empresa, 
                logo_foto = :logo_foto, 
                nombre_delegado = :nombre_delegado, 
                cargo_delegado = :cargo_delegado, 
                correo_empresa = :correo_empresa,
                password = :password,
                telefono_empresa = :telefono_empresa, 
                pagweb_empresa = :pagweb_empresa 
            WHERE id_empresa = :id_empresa');

        $update->bindValue('nombre_empresa', $empresa->getNombreEmpresa());
        $update->bindValue('logo_foto', $empresa->getLogoFoto());
        $update->bindValue('nombre_delegado', $empresa->getNombreDelegado());
        $update->bindValue('cargo_delegado', $empresa->getCargoDelegado());
        $update->bindValue('correo_empresa', $empresa->getCorreoEmpresa());
        $update->bindValue('password', $empresa->getPassword()); // 🔹 Nuevo campo
        $update->bindValue('telefono_empresa', $empresa->getTelefonoEmpresa());
        $update->bindValue('pagweb_empresa', $empresa->getPagwebEmpresa());
        $update->bindValue('id_empresa', $empresa->getIdEmpresa());
        $update->execute();
    }

    public static function delete($id_empresa)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM empresa WHERE id_empresa = :id_empresa');
        $delete->bindValue('id_empresa', $id_empresa);
        $delete->execute();
    }
}
?>
