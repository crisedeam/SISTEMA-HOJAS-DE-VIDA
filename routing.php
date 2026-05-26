<?php
$controllers = array(
    'persona' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'perfil', 'error'],
    'empresa' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'perfil', 'error'],
    'auth' => ['loginForm', 'login', 'registerForm', 'register', 'logout', 'error'],
    'educacion' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'perfil', 'error'],
    'experiencia' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'perfil', 'error'],
    'portafolio' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'perfil', 'error'],
    'vacante' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'perfil', 'error', 'detail', 'showempresa'],
    'postulacion' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'perfil', 'error']

);

// Prioriza los parámetros de la URL
$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;

if (isset($_SESSION['tipo'])) {
    // Si no hay parámetros, muestra el perfil por defecto
    if (!$controller) {
        $controller = $_SESSION['tipo'];
    }
    if (!$action) {
        $action = 'perfil';
    }
} else {
    // Si no hay sesión, muestra login por defecto
    if (!$controller) {
        $controller = 'auth';
    }
    if (!$action) {
        $action = 'loginForm';
    }
}

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('auth', 'error');  // Acción no válida
    }
} else {
    call('auth', 'error'); // Controlador no válido
}

function call($controller, $action)
{
    require_once('controllers/' . ucfirst($controller) . 'Controller.php');

    switch ($controller) {
        case 'auth':
            $controllerObj = new AuthController();
            break;
        case 'persona':
            require_once('models/Persona.php');
            $controllerObj = new PersonaController();
            break;
        case 'empresa':
            require_once('models/Empresa.php');
            $controllerObj = new EmpresaController();
            break;
        case 'educacion':
            require_once('models/Educacion.php');
            $controllerObj = new EducacionController();
            break;
        case 'experiencia':
            require_once('models/Experiencia.php');
            $controllerObj = new ExperienciaController();
            break;
        case 'portafolio':
            require_once('models/Portafolio.php');
            $controllerObj = new Portafoliocontroller();
            break;
        case 'vacante':
            require_once('models/Vacante.php');
            $controllerObj = new VacanteController();
            break;
        case 'postulacion':
            require_once('models/Postulacion.php');
            $controllerObj = new PostulacionController();
            break;
        default:
            die("Controlador no soportado.");
    }
    $controllerObj->{$action}();
}
?>