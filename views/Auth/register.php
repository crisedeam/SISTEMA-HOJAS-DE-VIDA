<div class="container mt-5" style="max-width: 800px;">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white text-center">
            <h5 class="mb-0 fw-bold">Crear Cuenta</h5>
        </div>
        <div class="card-body p-4">

            <form action="?controller=auth&action=register" method="POST" enctype="multipart/form-data">
                <!-- Tipo de usuario -->
                <div class="mb-4">
                    <label for="tipoUsuario" class="form-label fw-bold">Registrar como</label>
                    <select name="tipo" id="tipoUsuario" class="form-control" required onchange="mostrarFormulario()">
                        <option value="">Selecciona...</option>
                        <option value="persona">Persona</option>
                        <option value="empresa">Empresa</option>
                    </select>
                </div>

                <!-- Formulario Persona -->
                <div id="formPersona" style="display:none;">
                    <h6 class="fw-bold text-success mb-3">Datos de Persona</h6>
                    <div class="row g-3">
                        <!-- Fila 1: Nro Documento, Tipo Documento, Foto -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nro Documento</label>
                            <input type="text" name="nro_documento" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tipo Documento</label>
                            <input type="text" name="tipo_documento" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>

                        <!-- Fila 2: Nombres, Apellidos, Fecha Nacimiento -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Fecha Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-control">
                        </div>

                        <!-- Fila 3: Dirección, Ciudad, Teléfono -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion_residencia" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ciudad</label>
                            <input type="text" name="ciudad_residencia" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>

                        <!-- Fila 4: Correo, Contraseña, Sexo -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo_electronico" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="sexo" class="form-control">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otro</option>
                            </select>
                        </div>

                        <!-- Fila 5: Habilidades -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Habilidad 1</label>
                            <input type="text" name="hab1" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Habilidad 2</label>
                            <input type="text" name="hab2" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Habilidad 3</label>
                            <input type="text" name="hab3" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Formulario Empresa -->
                <div id="formEmpresa" style="display:none;">
                    <h6 class="fw-bold text-success mb-3">Datos de Empresa</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">ID Empresa</label>
                            <input type="text" name="id_empresa" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nombre Empresa</label>
                            <input type="text" name="nombre_empresa" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo_foto" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nombre Delegado</label>
                            <input type="text" name="nombre_delegado" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cargo Delegado</label>
                            <input type="text" name="cargo_delegado" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Correo Empresa</label>
                            <input type="email" name="correo_empresa" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono_empresa" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Página Web</label>
                            <input type="text" name="pagweb_empresa" class="form-control">
                        </div>
                    </div>
                </div>


                <!-- Botones -->
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-success fw-bold">Registrar</button>
                    <a href="?controller=auth&action=loginForm" class="btn btn-outline-success">¿Ya tienes cuenta?
                        Iniciar sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function mostrarFormulario() {
        var tipo = document.getElementById('tipoUsuario').value;
        document.getElementById('formPersona').style.display = (tipo === 'persona') ? 'block' : 'none';
        document.getElementById('formEmpresa').style.display = (tipo === 'empresa') ? 'block' : 'none';
    }
</script>