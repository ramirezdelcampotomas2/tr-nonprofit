<?php require_once __DIR__.'/partials/header.php'; ?>
<h2>Registrar Proyecto</h2>
<form class="card" method="post" action="project_save.php" onsubmit="return validarNoVacio('nombre');">
  <?= csrf_field() ?>
  <div class="row"><label>Nombre</label><input id="nombre" name="nombre" required></div>
  <div class="row"><label>Descripción</label><textarea name="descripcion" rows="3"></textarea></div>
  <div class="row"><label>Presupuesto (CLP)</label><input type="number" name="presupuesto" min="0" step="1000" required></div>
  <div class="row"><label>Fecha inicio</label><input type="date" name="fecha_inicio" required></div>
  <div class="row"><label>Fecha fin</label><input type="date" name="fecha_fin" required></div>
  <div class="row"><button type="submit">Guardar</button></div>
</form>
<?php require_once __DIR__.'/partials/footer.php'; ?>