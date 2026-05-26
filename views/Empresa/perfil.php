<?php
require_once __DIR__ . '/../../models/Empresa.php';
?>
<div class="container mt-4">
    <?php
    if (isset($_SESSION['usuario_id']) && $_SESSION['tipo'] === 'empresa') {
        $empresa = Empresa::searchById($_SESSION['usuario_id']);
        if ($empresa) {
    ?>

    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header con nombre de la empresa -->
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 font-weight-bold"><?php echo $empresa->getNombreEmpresa(); ?></h4>
        </div>

        <!-- Body con logo y fila de cards internas -->
        <div class="card-body p-4">
            <!-- Logo centrado -->
            <div class="d-flex justify-content-center mb-4">
                <?php if ($empresa->getLogoFoto()) { ?>
                    <img src="assets/uploads/empresa/<?php echo $empresa->getLogoFoto(); ?>" alt="Logo"
                         class="rounded-circle shadow-sm bg-secondary"
                         style="width:200px; height:200px; object-fit:cover;">
                <?php } else { ?>
                    <div class="text-muted">Sin logo</div>
                <?php } ?>
            </div>

            <!-- Fila con 2 Cards: Datos Básicos y Contacto -->
            <div class="row g-3">
                <!-- Card Datos Básicos -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-info rounded-3 h-100">
                        <div class="card-header bg-info text-white text-center">
                            <h6 class="mb-0 font-weight-bold">Datos Básicos</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="row mb-2">
                                <div class="col-6"><strong>ID Empresa:</strong></div>
                                <div class="col-6"><?php echo $empresa->getIdEmpresa(); ?></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Nombre Delegado:</strong></div>
                                <div class="col-6"><?php echo $empresa->getNombreDelegado(); ?></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Cargo Delegado:</strong></div>
                                <div class="col-6"><?php echo $empresa->getCargoDelegado(); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Contacto -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-info rounded-3 h-100">
                        <div class="card-header bg-info text-white text-center">
                            <h6 class="mb-0 font-weight-bold">Contacto</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="row mb-2">
                                <div class="col-6"><strong>Correo:</strong></div>
                                <div class="col-6"><?php echo $empresa->getCorreoEmpresa(); ?></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Teléfono:</strong></div>
                                <div class="col-6"><?php echo $empresa->getTelefonoEmpresa(); ?></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6"><strong>Página Web:</strong></div>
                                <div class="col-6"><?php echo $empresa->getPagwebEmpresa(); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer con botones -->
        <div class="card-footer bg-secondary text-center">
            <div class="d-flex justify-content-center">
                <a href="?controller=empresa&action=updateshow&id_empresa=<?php echo $empresa->getIdEmpresa(); ?>"
                   class="btn btn-warning font-weight-bold w-25 m-2">Editar</a>
                <a href="?controller=empresa&action=delete&id_empresa=<?php echo $empresa->getIdEmpresa(); ?>"
                   class="btn btn-danger font-weight-bold w-25 m-2"
                   onclick="return confirm('¿Estás seguro de que deseas eliminar tu perfil? Esta acción no se puede deshacer.');">Eliminar</a>
            </div>
        </div>
    </div>

    <?php
        } else {
            echo "<div class='alert alert-danger'>No se encontró la empresa en la base de datos.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No hay datos de empresa en sesión.</div>";
    }
    ?>
</div>
