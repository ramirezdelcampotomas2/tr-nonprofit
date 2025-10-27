<?php require_once __DIR__.'/partials/header.php'; $pdo=db();
$proyectos = $pdo->query("SELECT id_proyecto, nombre FROM PROYECTO ORDER BY nombre")->fetchAll();
$donantes  = $pdo->query("SELECT id_donante, nombre FROM DONANTE ORDER BY nombre")->fetchAll();
?>
<h2>Registrar Donación</h2>
<form class="card" method="post" action="donation_save.php">
  <?= csrf_field() ?>
  <div class="row"><label>Monto (CLP)</label><input type="number" name="monto" min="1000" step="500" required></div>
  <div class="row"><label>Fecha</label><input type="date" name="fecha" required></div>
  <div class="row"><label>Proyecto</label><select name="id_proyecto" required><?php foreach($proyectos as $p): ?><option value="<?= $p['id_proyecto'] ?>"><?= e($p['nombre']) ?></option><?php endforeach; ?></select></div>
  <div class="row"><label>Donante</label><select name="id_donante" required><?php foreach($donantes as $d): ?><option value="<?= $d['id_donante'] ?>"><?= e($d['nombre']) ?></option><?php endforeach; ?></select></div>
  <div class="row"><button type="submit">Guardar</button></div>
  <!-- Actualización TR: mensaje informativo para los usuarios -->
  <p class="muted">Recuerda que todas las donaciones son procesadas de forma segura.</p>
</form>
<?php require_once __DIR__.'/partials/footer.php'; ?>