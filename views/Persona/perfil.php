<div class="container">
  <?php
  if (isset($_GET['pers_id'])) {
      // Empresa ve el perfil de una persona
      $persona = Persona::searchByNroDocumento($_GET['pers_id']);
  } elseif (isset($_SESSION['usuario_id']) && $_SESSION['tipo'] === 'persona') {
      // Persona ve su propio perfil
      $persona = Persona::searchByNroDocumento($_SESSION['usuario_id']);
  } else {
      $persona = null;
  }

  if ($persona) {
  ?>

  <div class="card shadow-lg border-0 rounded-4">
    <!-- Header con nombre -->
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0 font-weight-bold">
        <?php echo $persona->getNombres() . ' ' . $persona->getApellidos(); ?>
      </h4>
    </div>

    <!-- Body -->
    <div class="card-body p-4">
      <!-- Grid 2x2: Foto, Datos Básicos, Contacto, Habilidades -->
      <div class="row g-2">
        <!-- Col 1: Foto -->
        <div class="col-md-6 mb-4 d-flex justify-content-center align-items-center">
          <?php if ($persona->getFoto()) { ?>
            <img src="assets/uploads/persona/<?php echo $persona->getFoto(); ?>" alt="Foto"
              class="rounded-circle bg-secondary shadow-sm" style="width:200px; height:200px; object-fit:cover;">
          <?php } else { ?>
            <div class="text-muted">Sin foto</div>
          <?php } ?>
        </div>

        <!-- Col 2: Datos Básicos -->
        <div class="col-md-6 mb-4">
          <div class="card shadow-sm border-info rounded-3 h-100">
            <div class="card-header bg-info text-white text-center">
              <h6 class="mb-0 font-weight-bold">Datos Básicos</h6>
            </div>
            <div class="card-body p-3">
              <div class="row mb-2">
                <div class="col-6"><strong>Nro Documento:</strong></div>
                <div class="col-6"><?php echo $persona->getNroDocumento(); ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-6"><strong>Tipo Documento:</strong></div>
                <div class="col-6"><?php echo $persona->getTipoDocumento(); ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-6"><strong>F. Nacimiento:</strong></div>
                <div class="col-6"><?php echo $persona->getFechaNacimiento(); ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-6"><strong>Sexo:</strong></div>
                <div class="col-6"><?php echo $persona->getSexo(); ?></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Col 3: Contacto -->
        <div class="col-md-6 mb-4">
          <div class="card shadow-sm border-info rounded-3 h-100">
            <div class="card-header bg-info text-white text-center">
              <h6 class="mb-0 font-weight-bold">Contacto</h6>
            </div>
            <div class="card-body p-3">
              <div class="row mb-2">
                <div class="col-6"><strong>Dirección:</strong></div>
                <div class="col-6"><?php echo $persona->getDireccionResidencia(); ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-6"><strong>Ciudad:</strong></div>
                <div class="col-6"><?php echo $persona->getCiudadResidencia(); ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-6"><strong>Correo:</strong></div>
                <div class="col-6"><?php echo $persona->getCorreoElectronico(); ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-6"><strong>Teléfono:</strong></div>
                <div class="col-6"><?php echo $persona->getTelefono(); ?></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Col 4: Habilidades -->
        <div class="col-md-6 mb-4">
          <div class="card shadow-sm border-info rounded-3 h-100">
            <div class="card-header bg-info text-white text-center">
              <h6 class="mb-0 font-weight-bold">Habilidades</h6>
            </div>
            <div class="card-body p-3">
              <div class="row mb-2">
                <div class="col-6"><strong>Habilidad 1:</strong></div>
                <div class="col-6"><?php echo $persona->getHab1(); ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-6"><strong>Habilidad 2:</strong></div>
                <div class="col-6"><?php echo $persona->getHab2(); ?></div>
              </div>
              <div class="row mb-2">
                <div class="col-6"><strong>Habilidad 3:</strong></div>
                <div class="col-6"><?php echo $persona->getHab3(); ?></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Footer -->
    <div class="card-footer bg-secondary text-center">
      <div class="d-flex justify-content-center">
        <?php if ($_SESSION['tipo'] === 'persona'): ?>
          <a href="?controller=persona&action=updateshow&nro_documento=<?php echo $persona->getNroDocumento(); ?>"
             class="btn btn-warning font-weight-bold w-25 m-2">Editar</a>
          <a href="?controller=persona&action=delete&nro_documento=<?php echo $persona->getNroDocumento(); ?>"
             class="btn btn-danger font-weight-bold w-25 m-2"
             onclick="return confirm('¿Estás seguro de que deseas eliminar tu perfil? Esta acción no se puede deshacer.');">Eliminar</a>
        <?php elseif ($_SESSION['tipo'] === 'empresa'): ?>
          <a href="?controller=postulacion&action=show"
             class="btn btn-primary font-weight-bold w-25 m-2">Regresar</a>
        <?php endif; ?>
      </div>
    </div>

  </div>

  <?php
  } else {
      echo "<div class='alert alert-danger'>No se encontró la persona en la base de datos.</div>";
  }
  ?>
</div>
