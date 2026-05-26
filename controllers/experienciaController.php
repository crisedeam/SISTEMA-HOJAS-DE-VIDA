<?php

class ExperienciaController
{
    function __construct()
    {
        // Constructor vacío
    }

    function index()
    {
        require_once('Views/Experiencia/bienvenido.php');
    }

    function register()
    {
        require_once('Views/Experiencia/register.php');
    }

    function save()
    {
        $experiencia = new Experiencia(
            null, // id_experiencia se autoincrementa en la base de datos
            $_POST['fecha_ini'],
            $_POST['fecha_fin'],
            $_POST['cargo'],
            $_POST['empresa'],
            $_POST['descripcion_funciones'],
            $_POST['nro_doc_persona']
        );

        Experiencia::save($experiencia);
        $this->show();
    }

    function show()
    {
        $nro_doc = $_SESSION['usuario_id'];
        $listaExperiencias = Experiencia::searchByPersona($nro_doc);
        require_once('Views/Experiencia/show.php');
    }

    function search()
    {
        $nro_doc = $_SESSION['usuario_id']; // el id de la persona logueada

        if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
            $busqueda = $_POST['busqueda'];
            $listaExperiencias = Experiencia::search($busqueda, $nro_doc);
            require_once('Views/Experiencia/show.php');
        } else {
            // Si no hay término de búsqueda, mostramos todos los estudios de esa persona
            $this->show();
        }
    }

    function updateshow()
    {
        $id_experiencia = $_GET['id_experiencia'];
        $experiencia = Experiencia::searchById($id_experiencia);
        require_once('Views/Experiencia/updateshow.php');
    }

    function update()
    {
        $experiencia = new Experiencia(
            $_POST['id_experiencia'],
            $_POST['fecha_ini'],
            $_POST['fecha_fin'],
            $_POST['cargo'],
            $_POST['empresa'],
            $_POST['descripcion_funciones'],
            $_POST['nro_doc_persona']
        );

        Experiencia::update($experiencia);
        $this->show();
    }

    function delete()
    {
        $id_experiencia = $_GET['id_experiencia'];
        Experiencia::delete($id_experiencia);
        $this->show();
    }

    function error()
    {
        require_once('Views/Experiencia/error.php');
    }
}
?>
