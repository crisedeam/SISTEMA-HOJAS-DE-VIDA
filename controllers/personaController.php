<?php

class PersonaController
{

    function __construct()
    {
        // Constructor vacío
    }

    function index()
    {
        require_once('Views/Persona/bienvenido.php');
    }

    function register()
    {
        require_once('Views/Persona/register.php');
    }

    function save()
    {
        // Manejo del foto
        $fotoName = null;
        if (!empty($_FILES['foto']['name'])) {
            $uploadsDir = "assets/uploads/persona/";
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }

            $fotoName = time() . "_" . basename($_FILES['foto']['name']);
            $fotoPath = $uploadsDir . $fotoName;

            move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath);
        }

        $persona = new Persona(
            $_POST['nro_documento'],
            $_POST['tipo_documento'],
            $fotoName,
            $_POST['nombres'],
            $_POST['apellidos'],
            $_POST['fecha_nacimiento'],
            $_POST['direccion_residencia'],
            $_POST['ciudad_residencia'],
            $_POST['correo_electronico'],
            $_POST['telefono'],
            $_POST['password'],
            $_POST['sexo'],
            $_POST['hab1'],
            $_POST['hab2'],
            $_POST['hab3']
        );

        Persona::save($persona);
        $this->show();
    }

    function show()
    {
        $listaPersonas = Persona::all();
        require_once('Views/Persona/perfil.php'); // Cambiado a la vista del perfil, antes cambiaba a show.php
    }

    function updateshow()
    {
        $nro_documento = $_GET['nro_documento'];
        $persona = Persona::searchByNroDocumento($nro_documento);
        require_once('Views/Persona/updateshow.php');
    }

    function update()
    {
        // Primero recuperamos la foto existente
        $personaActual = Persona::searchByNroDocumento($_POST['nro_documento']);
        $fotoName = $personaActual ? $personaActual->getFoto() : null;

        // Si se sube un nuevo archivo, reemplazar
        if (!empty($_FILES['foto']['name'])) {
            $uploadsDir = "assets/uploads/persona/";
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

        $persona = new Persona(
            $_POST['nro_documento'],
            $_POST['tipo_documento'],
            $fotoName, // antiene el logo anterior o guarda el nuevo
            $_POST['nombres'],
            $_POST['apellidos'],
            $_POST['fecha_nacimiento'],
            $_POST['direccion_residencia'],
            $_POST['ciudad_residencia'],
            $_POST['correo_electronico'],
            $_POST['telefono'],
            $_POST['password'],
            $_POST['sexo'],
            $_POST['hab1'],
            $_POST['hab2'],
            $_POST['hab3']
        );

        Persona::update($persona);
        $this->show();
    }

    function delete()
    {
        $nro_documento = $_GET['nro_documento'];
        Persona::delete($nro_documento);
        $this->show();
    }

    function search()
    {
        if (!empty($_POST['nro_documento'])) {
            $nro_documento = $_POST['nro_documento'];
            $persona = Persona::searchByNroDocumento($nro_documento);
            $listaPersonas[] = $persona;
            require_once('Views/Persona/show.php');
        } else {
            $listaPersonas = Persona::all();
            require_once('Views/Persona/show.php');
        }
    }

    function error()
    {
        require_once('Views/Persona/error.php');
    }

    function perfil()
    {
        // Carga la vista del perfil de la persona
        require_once __DIR__ . '/../views/Persona/perfil.php';
    }
}
?>