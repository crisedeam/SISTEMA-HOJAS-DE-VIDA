<?php
require_once 'Persona.php';
require_once 'Empresa.php';

class Usuario
{
    public static function login($correo, $password, $tipo)
    {
        if ($tipo === 'persona') {
            $user = Persona::searchByCorreo($correo);
            if ($user && $password == $user->getPassword()) {
                return $user;
            }
        } else if ($tipo === 'empresa') {
            $user = Empresa::searchByCorreo($correo);
            if ($user && $password == $user->getPassword()) {
                return $user;
            }
        } else {
            return false;
        }
        return false;
    }
}
?>