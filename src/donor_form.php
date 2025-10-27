<?php require_once __DIR__.'/partials/header.php'; ?>
<h2>Registrar Donante</h2>
<form class="card" method="post" action="donor_save.php" onsubmit="return validarNoVacio('d_nombre');">
  <?= csrf_field() ?>
  <div class="row"><label>Nombre</label><input id="d_nombre" name="nombre" required></div>
  <div class="row"><label>Email</label><input type="email" name="email" required></div>
  <div class="row"><label>Dirección</label><input name="direccion"></div>
  <div class="row"><label>Teléfono</label><input name="telefono"></div>
  <div class="row"><button type="submit">Guardar</button></div>
</form>
<?php require_once __DIR__.'/partials/footer.php'; ?>