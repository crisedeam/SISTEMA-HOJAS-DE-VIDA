<?php
class PostulacionController
{
    function __construct()
    {

    }

    function index()
    {
        require_once('Views/Postulacion/bienvenido.php');
    }

    function register()
    {
        require_once('Views/Postulacion/register.php');
    }

    function save()
    {

        $pers_id = $_POST['pers_id'];
        $vac_id = $_POST['vac_id'];
        $estado = $_POST['estado'];
        $observaciones = $_POST['observaciones'];
        $fecha_postulacion = $_POST['fecha_postulacion'];

        // 1. Validar si ya existe la postulación
        if (Postulacion::exists($pers_id, $vac_id)) {
            $_SESSION['error'] = "Ya te has postulado a esta vacante:" . $pers_id . "-" . $vac_id . ". No puedes postularte nuevamente.";
            header("Location: ?controller=postulacion&action=show");
            exit();
        }

        // 2. Si no existe, guardar
        $postulacion = new Postulacion($pers_id, $vac_id, $estado, $observaciones, $fecha_postulacion);
        Postulacion::save($postulacion);

        $_SESSION['success'] = "Te has postulado con éxito.";
        header("Location: ?controller=postulacion&action=show");
        exit();


        /*
        $postulacion = new Postulacion(
            $_POST['pers_id'],
            $_POST['vac_id'],
            $_POST['estado'],
            $_POST['observaciones'],
            $_POST['fecha_postulacion']
        );

        Postulacion::save($postulacion);
        $this->show(); */
    }

    function show()
    {
        if ($_SESSION['tipo'] == 'empresa') {
            $listaPostulaciones = Postulacion::getByEmpresa($_SESSION['usuario_id']);
        } else {
            $listaPostulaciones = Postulacion::getByPersona($_SESSION['usuario_id']);
        }

        require_once('Views/Postulacion/show.php');
    }

    function showall()
    {
        $listaPostulaciones = Postulacion::all();
        require_once('Views/Postulacion/show.php');
    }

    function updateshow()
    {
        $pers_id = $_GET['pers_id'];
        $vac_id = $_GET['vac_id'];
        $postulacion = Postulacion::searchById($pers_id, $vac_id);
        require_once('Views/Postulacion/updateshow.php');
    }

    function update()
    {
        $postulacion = new Postulacion(
            $_POST['pers_id'],
            $_POST['vac_id'],
            $_POST['estado'],
            $_POST['observaciones'],
            $_POST['fecha_postulacion']
        );

        Postulacion::update($postulacion);
        $this->show();
    }

    function delete()
    {
        $pers_id = $_GET['pers_id'];
        $vac_id = $_GET['vac_id'];
        Postulacion::delete($pers_id, $vac_id);
        $this->show();
    }

    function search()
    {
        if (!empty($_POST['pers_id']) && !empty($_POST['vac_id'])) {
            $pers_id = $_POST['pers_id'];
            $vac_id = $_POST['vac_id'];
            $postulacion = Postulacion::searchById($pers_id, $vac_id);
            $listaPostulaciones[] = $postulacion;
            require_once('Views/Postulacion/show.php');
        } else {
            $listaPostulaciones = Postulacion::all();
            require_once('Views/Postulacion/show.php');
        }
    }

    function error()
    {
        require_once('Views/Postulacion/error.php');
    }
}
?>