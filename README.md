# Sistema de Gestión de Hojas de Vida y Vacantes

Sistema web desarrollado en PHP para la gestión de hojas de vida, perfiles profesionales y vacantes laborales. Permite a personas registrar su información profesional y a empresas publicar ofertas de trabajo.

## 🚀 Características

- **Gestión de Personas**: Registro y administración de perfiles profesionales
- **Gestión de Empresas**: Perfiles corporativos y publicación de vacantes
- **Educación**: Registro de estudios y formación académica
- **Experiencia Laboral**: Historial profesional
- **Portafolio**: Proyectos y trabajos realizados
- **Vacantes**: Publicación y gestión de ofertas laborales
- **Postulaciones**: Sistema de aplicación a vacantes
- **Autenticación**: Sistema de login y registro diferenciado por tipo de usuario

## 📋 Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior / MariaDB 10.4 o superior
- Servidor web (Apache/Nginx)
- Extensiones PHP requeridas:
  - PDO
  - pdo_mysql
  - session

## 🔧 Instalación

1. Clona el repositorio:
```bash
git clone [URL_DE_TU_REPOSITORIO]
cd [NOMBRE_DEL_PROYECTO]
```

2. Configura la base de datos:
```bash
# Importa el archivo SQL en tu base de datos
mysql -u root -p < hv3.sql
```

3. Configura la conexión a la base de datos:
```bash
# Copia el archivo de ejemplo
cp connection.example.php connection.php

# Edita connection.php con tus credenciales
```

4. Configura los permisos de las carpetas de uploads:
```bash
chmod -R 755 assets/uploads/
```

5. Configura tu servidor web para apuntar al directorio del proyecto.

## 📁 Estructura del Proyecto

```
├── assets/              # Recursos estáticos
│   ├── css/            # Estilos (Bootstrap)
│   ├── js/             # Scripts JavaScript
│   └── uploads/        # Archivos subidos por usuarios
├── controllers/        # Controladores MVC
├── models/            # Modelos de datos
├── views/             # Vistas de la aplicación
│   ├── Auth/          # Login y registro
│   ├── Persona/       # Vistas de personas
│   ├── Empresa/       # Vistas de empresas
│   ├── Educacion/     # Gestión de educación
│   ├── Experiencia/   # Gestión de experiencia
│   ├── Portafolio/    # Gestión de portafolio
│   ├── Vacante/       # Gestión de vacantes
│   ├── Postulacion/   # Gestión de postulaciones
│   └── Layouts/       # Plantillas base
├── connection.php     # Configuración de BD (no incluido en repo)
├── index.php          # Punto de entrada
└── routing.php        # Sistema de rutas
```

## 🎯 Uso

### Acceso al Sistema

1. Accede a la aplicación desde tu navegador
2. Regístrate como Persona o Empresa
3. Completa tu perfil según tu tipo de usuario

### Para Personas

- Completa tu información personal
- Agrega tu educación y experiencia laboral
- Crea tu portafolio de proyectos
- Busca y postúlate a vacantes

### Para Empresas

- Completa el perfil de tu empresa
- Publica vacantes laborales
- Revisa las postulaciones recibidas

## 🔐 Seguridad

- Las contraseñas se almacenan de forma segura
- Sistema de sesiones para autenticación
- Validación de datos en servidor
- Protección contra inyección SQL mediante PDO

## 🛠️ Tecnologías Utilizadas

- **Backend**: PHP (Arquitectura MVC)
- **Base de Datos**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 4
- **Librerías**: jQuery 3.2.1

## 📝 Configuración

### Base de Datos

Edita `connection.php` con tus credenciales:

```php
self::$instance= new PDO('mysql:host=localhost;dbname=hv3', 'tu_usuario', 'tu_contraseña', $pdo_options);
```

### Rutas

El sistema utiliza un enrutador simple basado en parámetros GET:
- `?controller=nombre&action=accion`

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Por favor:

1. Haz fork del proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto es de código abierto y está disponible bajo la licencia MIT.

## ✨ Autor

Cristihan Ederik Alvarado Muñoz
Luis Mauricio Sierra 
Andres Felipe Vargas

## 📧 Contacto

Para preguntas o sugerencias, por favor abre un issue en el repositorio.
