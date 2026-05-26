<div class="container mt-5" style="max-width: 450px;">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0 fw-bold">Iniciar Sesión</h5>
        </div>
        <div class="card-body p-4">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="?controller=auth&action=login" method="POST">
                <!-- Correo -->
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" required>
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <!-- Tipo de Usuario -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Ingresar como</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="persona">Persona</option>
                        <option value="empresa">Empresa</option>
                        <!--<option value="admin">Administrador</option>-->
                    </select>
                </div>

                <!-- Botones -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary fw-bold">Ingresar</button>
                    <a href="?controller=auth&action=registerForm" class="btn btn-outline-primary">¿No tienes cuenta?
                        Regístrate</a>
                </div>
            </form>
        </div>
    </div>
</div>