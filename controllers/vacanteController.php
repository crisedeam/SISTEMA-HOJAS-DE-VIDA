<?php

class VacanteController
{
    function __construct()
    {

    }

    function index()
    {
        require_once('Views/Vacante/bienvenido.php');
    }

    function register()
    {
        require_once('Views/Vacante/register.php');
    }

    function save()
    {
        $vacante = new Vacante(
            null, // vacant_id=null se autoincrementa en la BD
            $_POST['empr_id'],
            $_POST['cargo'],
            $_POST['desc_cargo'],
            $_POST['nro_vacantes'],
            $_POST['requisitos'],
            $_POST['exp_requerida'],
            $_POST['tipo_vinculo'],
            $_POST['ubicacion'],
            $_POST['salario'],
            $_POST['fecha_cierre']
        );

        Vacante::save($vacante);
        $this->show();
    }

    function show()
    {
        $tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : ''; // Si no hay sesión, vacío

        if ($tipo == 'empresa') {
            // Mostrar solo vacantes de la empresa logueada
            $listaVacantes = Vacante::searchByEmpresa($_SESSION['usuario_id']);
        } else {
            // Mostrar todas las vacantes para personas o usuarios no logueados
            $listaVacantes = Vacante::all();
        }

        require_once('Views/Vacante/show.php');
    }



    function search()
    {
        $tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : '';

        if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
            $busqueda = $_POST['busqueda'];

            if ($tipo == 'empresa') {
                $listaVacantes = Vacante::search($busqueda, $_SESSION['usuario_id']);
            } else {
                $listaVacantes = Vacante::search($busqueda);
            }

            require_once('Views/Vacante/show.php');
        } else {
            $this->show();
        }
    }



    function updateshow()
    {
        $vacant_id = $_GET['vacant_id'];
        $vacante = Vacante::searchById($vacant_id);
        require_once('Views/Vacante/updateshow.php');
    }

    function update()
    {
        $vacante = new Vacante(
            $_POST['vacant_id'],
            $_POST['empr_id'],
            $_POST['cargo'],
            $_POST['desc_cargo'],
            $_POST['nro_vacantes'],
            $_POST['requisitos'],
            $_POST['exp_requerida'],
            $_POST['tipo_vinculo'],
            $_POST['ubicacion'],
            $_POST['salario'],
            $_POST['fecha_cierre']
        );

        Vacante::update($vacante);
        $this->show();
    }

    function delete()
    {
        $vacant_id = $_GET['vacant_id'];
        Vacante::delete($vacant_id);
        $this->show();
    }

    function error()
    {
        require_once('Views/Vacante/error.php');
    }

    public function detail()
    {
        if (isset($_GET['vacant_id'])) {
            $vacant_id = $_GET['vacant_id'];

            // Llamamos al DAO o Modelo para obtener la info de la vacante
            $vacante = Vacante::searchById($vacant_id);

            if ($vacante) {
                require_once "views/vacante/info.php";  // Cargar vista con todos los datos
            } else {
                echo "<div class='alert alert-danger'>Vacante no encontrada.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>ID de vacante no proporcionado.</div>";
        }
    }
}
?>