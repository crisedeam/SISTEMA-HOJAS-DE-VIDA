<?php
class EducacionController
{
    function __construct()
    {
    }

    function index()
    {
        require_once('Views/Educacion/bienvenido.php');
    }

    function register()
    {
        require_once('Views/Educacion/register.php');
    }

    function save()
    {
        $estudio = new Educacion(
            null,
            $_POST['fecha_ini'],
            $_POST['fecha_fin'],
            $_POST['titulo_estudio'],
            $_POST['entidad'],
            $_POST['descripcion'],
            $_POST['nro_doc_persona']
        );
        Educacion::save($estudio);
        $this->show();
    }

    function show()
    {
        $nro_doc = $_SESSION['usuario_id'];
        $listaEducacion = Educacion::searchByPersona($nro_doc);
        require_once('Views/Educacion/show.php');
    }

    function search()
    {
        $nro_doc = $_SESSION['usuario_id']; // el id de la persona logueada

        if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
            $busqueda = $_POST['busqueda'];
            $listaEducacion = Educacion::search($busqueda, $nro_doc);
            require_once('Views/Educacion/show.php');
        } else {
            // Si no hay término de búsqueda, mostramos todos los estudios de esa persona
            $this->show();
        }
    }



    function updateshow()
    {
        $id = $_GET['id_estudio'];
        $estudio = Educacion::searchById($id);
        require_once('Views/Educacion/updateshow.php');
    }

    function update()
    {
        $estudio = new Educacion(
            $_POST['id_estudio'],
            $_POST['fecha_ini'],
            $_POST['fecha_fin'],
            $_POST['titulo_estudio'],
            $_POST['entidad'],
            $_POST['descripcion'],
            $_POST['nro_doc_persona']
        );
        Educacion::update($estudio);
        $this->show();
    }

    function delete()
    {
        $id = $_GET['id_estudio'];
        Educacion::delete($id);
        $this->show();
    }

    function error()
    {
        require_once('Views/Educacion/error.php');
    }
}
?>