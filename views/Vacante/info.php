<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 font-weight-bold">
                Vacante: <?php echo $vacante->getVacantId() . " - " . htmlspecialchars($vacante->getCargo()); ?>
            </h4>
        </div>
        <div class="card-body p-4">
            <?php
            $modo = 'info'; // define modo info
            require_once('form.php');
            ?>
        </div>
    </div>
</div>