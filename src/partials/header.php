<?php require_once __DIR__.'/../bootstrap.php'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ONG Demo – Semana 6</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
  <a href="index.php"><strong>ONG Demo</strong></a>
  <nav>
    <a href="index.php">Proyectos</a>
    <a href="events.php">Eventos</a>
    <a href="event_form.php">Registrar evento</a>
    <a href="cart.php">Carrito donaciones (<?= isset($_SESSION['donation_cart']) ? count($_SESSION['donation_cart']) : 0 ?>)</a>
  </nav>
</header>
<main class="container">
<?php if ($msg = flash('ok')): ?>
  <div class="alert success"><?= e($msg) ?></div>
<?php endif; ?>
<?php if ($msg = flash('err')): ?>
  <div class="alert error"><?= e($msg) ?></div>
<?php endif; ?>
