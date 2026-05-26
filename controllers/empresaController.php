<?php

class EmpresaController
{
    function __construct()
    {
    }

    function index()
    {
        require_once('Views/Empresa/bienvenido.php');
    }

    function register()
    {
        require_once('Views/Empresa/register.php');
    }

    // Guarda una nueva Empresa
    function save()
    {
        // Manejo del logo
        $logoName = null;
        if (!empty($_FILES['logo_foto']['name'])) {
            $uploadsDir = "assets/uploads/empresa/";
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }

            $logoName = time() . "_" . basename($_FILES['logo_foto']['name']);
            $logoPath = $uploadsDir . $logoName;

            move_uploaded_file($_FILES['logo_foto']['tmp_name'], $logoPath);
        }

        $empresa = new Empresa(
            $_POST['id_empresa'],
            $_POST['nombre_empresa'],
            $logoName,
            $_POST['nombre_delegado'],
            $_POST['cargo_delegado'],
            $_POST['correo_empresa'],
            $_POST['password'],
            $_POST['telefono_empresa'],
            $_POST['pagweb_empresa']
        );

        Empresa::save($empresa);
        $this->show();
    }

    function show()
    {
        $listaEmpresas = Empresa::all();
        require_once('Views/Empresa/perfil.php');
    }

    function updateshow()
    {
        $id = $_GET['id_empresa'] ?? null;
        if (!$id) {
            return $this->error();
        }

        $empresa = Empresa::searchById($id);
        require_once('Views/Empresa/updateshow.php');
    }

    // Procesa actualización de empresa
    function update()
    {
        // Primero recuperamos el logo existente
        $empresaActual = Empresa::searchById($_POST['id_empresa']);
        $logoName = $empresaActual ? $empresaActual->getLogoFoto() : null;

        // Si se sube un nuevo archivo, reemplazar
        if (!empty($_FILES['logo_foto']['name'])) {
            $uploadsDir = "assets/uploads/empresa/";
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }

            // Eliminar logo antiguo si existe
            if ($logoName && file_exists($uploadsDir . $logoName)) {
                unlink($uploadsDir . $logoName);
            }

            // Guardar nuevo logo
            $logoName = time() . "_" . basename($_FILES['logo_foto']['name']);
            $logoPath = $uploadsDir . $logoName;
            move_uploaded_file($_FILES['logo_foto']['tmp_name'], $logoPath);
        }

        $empresa = new Empresa(
            $_POST['id_empresa'],
            $_POST['nombre_empresa'],
            $logoName, // antiene el logo anterior o guarda el nuevo
            $_POST['nombre_delegado'],
            $_POST['cargo_delegado'],
            $_POST['correo_empresa'],
            $_POST['password'],
            $_POST['telefono_empresa'],
            $_POST['pagweb_empresa']
        );

        Empresa::update($empresa);
        $this->show();
    }

    function delete()
    {
        $id = $_GET['id_empresa'] ?? null;
        if ($id) {
            Empresa::delete($id);
        }
        $this->show();
    }

    function search()
    {
        if (!empty($_POST['id_empresa'])) {
            $id = $_POST['id_empresa'];
            $e = Empresa::searchById($id);
            $listaEmpresas = $e ? [$e] : [];
        } else {
            $listaEmpresas = Empresa::all();
        }
        require_once('Views/Empresa/show.php');
    }

    function error()
    {
        require_once('Views/Empresa/error.php');
    }

    public function perfil()
    {
        require_once __DIR__ . '/../views/Empresa/perfil.php';
    }
}
?>