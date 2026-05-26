<?php
// Detecta usuario y tipo de sesión
$usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : '';
$tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : '';
?>

<form 
    action="<?php 
        if(isset($modo) && $modo=='info'){
            echo '?controller=postulacion&action=save';
        } else {
            echo (isset($modo) && $modo=='editar') ? '?controller=vacante&action=update' : '?controller=vacante&action=save';
        }
    ?>" 
    method="post" 
    class="mt-0"
>
    <!-- ID de vacante: solo se envía si editamos o modo info -->
    <?php if(isset($vacante) && ($modo=='editar' || $modo=='info')): ?>
        <input type="hidden" name="vacant_id" value="<?php echo $vacante->getVacantId(); ?>">

        <?php if($modo=='info' && $tipo=='persona'): ?>
            <!-- Datos ocultos para guardar la postulación -->
            <input type="hidden" name="pers_id" value="<?php echo $usuario_id; ?>">
            <input type="hidden" name="vac_id" value="<?php echo $vacante->getVacantId(); ?>">
            <input type="hidden" name="estado" value="Pendiente">
            <input type="hidden" name="observaciones" value="">
            <input type="hidden" name="fecha_postulacion" value="<?php echo date('Y-m-d'); ?>">
        <?php endif; ?>
    <?php endif; ?>

    <!-- Empresa -->
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="form-label fw-bold">Empresa</label>
            <input type="text" name="empr_id" class="form-control" 
                value="<?php echo isset($vacante) ? htmlspecialchars($vacante->getEmprId()) : $usuario_id; ?>" 
                readonly>
        </div>

        <!-- Cargo -->
        <div class="col-md-3">
            <label class="form-label fw-bold">Cargo</label>
            <input type="text" name="cargo" class="form-control" 
                value="<?php echo isset($vacante)?htmlspecialchars($vacante->getCargo()):''; ?>" 
                <?php echo (isset($modo) && $modo=='info')?'readonly':''; ?>>
        </div>

        <!-- N° Vacantes -->
        <div class="col-md-3">
            <label class="form-label fw-bold">N° Vacantes</label>
            <input type="number" name="nro_vacantes" class="form-control" 
                value="<?php echo isset($vacante)?htmlspecialchars($vacante->getNroVacantes()):''; ?>" 
                <?php echo (isset($modo) && $modo=='info')?'readonly':''; ?>>
        </div>

        <!-- Experiencia -->
        <div class="col-md-3">
            <label class="form-label fw-bold">Experiencia Requerida</label>
            <input type="number" name="exp_requerida" class="form-control" 
                value="<?php echo isset($vacante)?htmlspecialchars($vacante->getExpRequerida()):''; ?>" 
                <?php echo (isset($modo) && $modo=='info')?'readonly':''; ?>>
        </div>
    </div>

    <!-- Descripción y requisitos -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label fw-bold">Descripción del Cargo</label>
            <textarea name="desc_cargo" class="form-control" rows="4" <?php echo (isset($modo) && $modo=='info')?'readonly':''; ?>><?php echo isset($vacante)?htmlspecialchars($vacante->getDescCargo()):''; ?></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-bold">Requisitos</label>
            <textarea name="requisitos" class="form-control" rows="4" <?php echo (isset($modo) && $modo=='info')?'readonly':''; ?>><?php echo isset($vacante)?htmlspecialchars($vacante->getRequisitos()):''; ?></textarea>
        </div>
    </div>

    <!-- Tipo Vínculo, Ubicación, Salario, Fecha Cierre -->
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="form-label fw-bold">Tipo de Vínculo</label>
            <select name="tipo_vinculo" class="form-control" <?php echo (isset($modo) && $modo=='info')?'disabled':''; ?>>
                <?php
                $opciones = ['Tiempo completo','Medio tiempo','Prácticas','Contrato temporal','Freelance'];
                $selected = isset($vacante) ? $vacante->getTipoVinculo() : '';
                foreach($opciones as $op) {
                    $sel = ($op == $selected) ? 'selected' : '';
                    echo "<option value='$op' $sel>$op</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-bold">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" 
                value="<?php echo isset($vacante)?htmlspecialchars($vacante->getUbicacion()):''; ?>" 
                <?php echo (isset($modo) && $modo=='info')?'readonly':''; ?>>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-bold">Salario</label>
            <input type="text" name="salario" class="form-control" 
                value="<?php echo isset($vacante)?htmlspecialchars($vacante->getSalario()):''; ?>" 
                <?php echo (isset($modo) && $modo=='info')?'readonly':''; ?>>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-bold">Fecha de Cierre</label>
            <input type="date" name="fecha_cierre" class="form-control" 
                value="<?php echo isset($vacante)?htmlspecialchars($vacante->getFechaCierre()):''; ?>" 
                <?php echo (isset($modo) && $modo=='info')?'readonly':''; ?>>
        </div>
    </div>

    <!-- Botones -->
    <div class="d-flex justify-content-start mt-3">
        <?php if(!isset($modo) || $modo != 'info'): ?>
            <!-- Modo agregar/editar -->
            <button type="submit" class="btn btn-success w-25 mr-2">Guardar</button>
            <a href="?controller=vacante&action=show" class="btn btn-secondary w-25">Cancelar</a>
        <?php else: ?>
            <!-- Modo info -->
            <?php if($tipo == 'persona'): ?>
                <!-- Persona logueada: puede postular -->
                <button type="submit" class="btn btn-success mr-2">Postularme</button>
                <a href="?controller=vacante&action=show" class="btn btn-secondary">Cancelar</a>
            <?php else: ?>
                <!-- Empresa o usuario no logueado: solo volver -->
                <a href="?controller=vacante&action=show" class="btn btn-secondary">Volver</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</form>
