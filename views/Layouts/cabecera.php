<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo o nombre del proyecto 
        <a href="#" class="navbar-logo">Mi Proyecto</a>-->

        <!-- Menú principal -->
        <ul class="navbar-menu">
            <?php
            if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'persona') {
                ?>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=persona&action=perfil">Perfil</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=educacion&action=show">Educación</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=experiencia&action=show">Experiencia</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=portafolio&action=show">Portafolio</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=vacante&action=show">Vacantes</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=postulacion&action=show">Postulaciones</a>
                </li>
                <li class="navbar-item ms">
                    <a class="navbar-link navbar-cta" href="?controller=auth&action=logout">Cerrar sesión</a>
                </li>
                <?php
            } elseif (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'empresa') {
                ?>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=empresa&action=perfil">Perfil</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=vacante&action=show">Vacantes</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=postulacion&action=show">Postulaciones</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link navbar-cta" href="?controller=auth&action=logout">Cerrar sesión</a>
                </li>
                <?php
            } else {
                ?>
                <li class="navbar-item">
                    <a class="navbar-link" href="?controller=vacante&action=show">Vacantes</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link navbar-cta" href="?controller=auth&action=logout">Iniciar sesión</a>
                </li>
                <?php
            }
            ?>

        </ul>

        <!-- Botón hamburguesa para responsive -->
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>

<script>
    // Toggle menú hamburguesa
    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.navbar-menu');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        menu.classList.toggle('active');
    });
</script>