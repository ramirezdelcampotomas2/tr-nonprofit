<?php require_once __DIR__.'/partials/header.php'; $pdo=db(); ?>
<h2>Tablas</h2>
<div class="card">
<h3>Proyectos</h3>
<table><thead><tr><th>ID</th><th>Nombre</th><th>Presupuesto</th><th>Inicio</th><th>Fin</th></tr></thead><tbody>
<?php foreach($pdo->query("SELECT id_proyecto,nombre,presupuesto,fecha_inicio,fecha_fin FROM PROYECTO ORDER BY id_proyecto") as $r): ?>
<tr><td><?= $r['id_proyecto'] ?></td><td><?= e($r['nombre']) ?></td><td><?= number_format($r['presupuesto'],0,',','.') ?></td><td><?= $r['fecha_inicio'] ?></td><td><?= $r['fecha_fin'] ?></td></tr>
<?php endforeach; ?></tbody></table>
</div>
<div class="card">
<h3>Donantes</h3>
<table><thead><tr><th>ID</th><th>Nombre</th><th>Email</th></tr></thead><tbody>
<?php foreach($pdo->query("SELECT id_donante,nombre,email FROM DONANTE ORDER BY id_donante") as $r): ?>
<tr><td><?= $r['id_donante'] ?></td><td><?= e($r['nombre']) ?></td><td><?= e($r['email']) ?></td></tr>
<?php endforeach; ?></tbody></table>
</div>

<h2>Consulta avanzada</h2>
<p class="muted">Proyectos con <strong>más de 2 donaciones</strong> y su <strong>monto total recaudado</strong>.</p>
<table><thead><tr><th>Proyecto</th><th># Donaciones</th><th>Total Recaudado</th></tr></thead><tbody>
<?php
$sql = "SELECT p.nombre AS proyecto, COUNT(d.id_donacion) AS num_don, SUM(d.monto) AS total
        FROM PROYECTO p
        JOIN DONACION d ON d.id_proyecto = p.id_proyecto
        GROUP BY p.id_proyecto
        HAVING COUNT(d.id_donacion) > 2
        ORDER BY total DESC";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();
if (!$rows){ echo '<tr><td colspan=3>No hay proyectos con más de 2 donaciones aún.</td></tr>'; }
foreach($rows as $r): ?>
<tr><td><?= e($r['proyecto']) ?></td><td><?= $r['num_don'] ?></td><td><?= number_format($r['total'],0,',','.') ?></td></tr>
<?php endforeach; ?>
</tbody></table>
<?php require_once __DIR__.'/partials/footer.php'; ?>