<?php

require_once __DIR__ . '/../models/Persona.php';
require_once __DIR__ . '/../models/Empresa.php';
require_once __DIR__ . '/../models/Usuario.php';

class AuthController
{
    public function loginForm()
    {
        require_once __DIR__ . '/../views/Auth/login.php';
    }

    public function login()
    {
        $correo = $_POST['correo'] ?? '';
        $password = $_POST['password'] ?? '';
        $tipo = $_POST['tipo'] ?? ''; // persona o empresa

        if (!$correo || !$password || !$tipo) {
            $error = "Completa todos los campos.";
            require_once __DIR__ . '/../views/Auth/login.php';
            return;
        }

        $user = Usuario::login($correo, $password, $tipo);

        if ($user) {
            if ($tipo === 'persona') {
                $_SESSION['usuario_id'] = $user->getNroDocumento();
            } elseif ($tipo === 'empresa') {
                $_SESSION['usuario_id'] = $user->getIdEmpresa();
            }
            $_SESSION['tipo'] = $tipo;

            header('Location: index.php');
            exit;
        }

        $error = "Correo, contraseña o tipo incorrectos";
        require_once __DIR__ . '/../views/Auth/login.php';
    }

    public function registerForm()
    {
        require_once __DIR__ . '/../views/Auth/register.php';
    }

    public function register()
    {
        $tipo = $_POST['tipo'] ?? '';

        if ($tipo === 'persona') {
            $persona = new Persona(
                $_POST['nro_documento'],
                $_POST['tipo_documento'],
                $_POST['foto'],
                $_POST['nombres'],
                $_POST['apellidos'],
                $_POST['fecha_nacimiento'],
                $_POST['direccion_residencia'],
                $_POST['ciudad_residencia'],
                $_POST['correo_electronico'],
                $_POST['telefono'],
                $_POST['password'], // sin hash
                $_POST['sexo'],
                $_POST['hab1'],
                $_POST['hab2'],
                $_POST['hab3']
            );
            Persona::save($persona);

        } elseif ($tipo === 'empresa') {
            require_once __DIR__ . '/../controllers/empresaController.php';
            $empresaController = new EmpresaController();
            $empresaController->save(); // 👈 Llama al método directamente
            return;

        } else {
            $error = "Tipo de usuario inválido.";
            require_once __DIR__ . '/../views/Auth/register.php';
            return;
        }

        // Después de registrar, redirige al login
        header('Location: index.php?controller=auth&action=loginForm');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?controller=auth&action=loginForm');
        exit;
    }

    public function error()
    {
        $error = "Ruta o acción no válida.";
        require_once __DIR__ . '/../views/Auth/login.php';
    }
}