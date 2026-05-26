<?php

class Portafoliocontroller
{
    function __construct()
    {

    }


    function index()
    {
        require_once('Views/Portafolio/bienvenido.php');
    }


    function register()
    {
        require_once('Views/Portafolio/register.php');
    }


    function save()
    {
        // Manejo del foto
        $fotoName = null;
        if (!empty($_FILES['foto']['name'])) {
            $uploadsDir = "assets/uploads/portafolio/";
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }

            $fotoName = time() . "_" . basename($_FILES['foto']['name']);
            $fotoPath = $uploadsDir . $fotoName;

            move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath);
        }

        $portafolio = new Portafolio(
            null,
            $_POST['nombre_proyecto'],
            $_POST['fecha'],
            $_POST['descripcion_proyecto'],
            $fotoName,
            $_POST['link_proyecto'],
            $_POST['nro_doc_persona']
        );

        Portafolio::save($portafolio);
        $this->show();
    }


    function show()
    {
        $nro_doc = $_SESSION['usuario_id'];
        $listaProyecto = Portafolio::searchByPersona($nro_doc);
        require_once('Views/Portafolio/show.php');
    }

    function search()
    {
        $nro_doc = $_SESSION['usuario_id']; // id persona logueada

        if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
            $busqueda = $_POST['busqueda'];
            $listaProyecto = Portafolio::search($busqueda, $nro_doc);
            require_once('Views/Portafolio/show.php');
        } else {
            // si no hay búsqueda, muestra todos los proyectos de esa persona
            $this->show();
        }
    }

    function updateshow()
    {
        $id = $_GET['id_proyecto'];
        $portafolio = Portafolio::searchById($id);
        require_once('Views/Portafolio/updateshow.php');
    }


    function update()
    {
        // Primero recuperamos la foto existente
        $portafiloActual = Portafolio::searchById($_POST['id_proyecto']);
        $fotoName = $portafiloActual ? $portafiloActual->getFoto() : null;

        // Si se sube un nuevo archivo, reemplazar
        if (!empty($_FILES['foto']['name'])) {
            $uploadsDir = "assets/uploads/portafolio/";
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }

            // Eliminar la foto antigua si existe
            if ($fotoName && file_exists($uploadsDir . $fotoName)) {
                unlink($uploadsDir . $fotoName);
            }

            // Guardar la nueva foto
            $fotoName = time() . "_" . basename($_FILES['foto']['name']);
            $fotoPath = $uploadsDir . $fotoName;
            move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath);
        }

        $portafolio = new Portafolio(
            $_POST['id_proyecto'],
            $_POST['nombre_proyecto'],
            $_POST['fecha'],
            $_POST['descripcion_proyecto'],
            $fotoName,
            $_POST['link_proyecto'],
            $_POST['nro_doc_persona']
        );
        Portafolio::update($portafolio);
        $this->show();
    }


    function delete()
    {
        $id = $_GET['id_proyecto'];
        Portafolio::delete($id);
        $this->show();
    }

    function error()
    {
        require_once('Views/Portafolio/error.php');
    }
}
?>