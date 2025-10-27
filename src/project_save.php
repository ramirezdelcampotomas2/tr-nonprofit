<?php
require_once __DIR__.'/bootstrap.php';
if($_SERVER['REQUEST_METHOD']!=='POST' || !csrf_verify()){ flash('err','Solicitud inválida'); header('Location: project_form.php'); exit; }
try{
  $pdo = db();
  $stmt = $pdo->prepare("INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) VALUES (?,?,?,?,?)");
  $stmt->execute([ $_POST['nombre'], $_POST['descripcion'] ?? '', $_POST['presupuesto'], $_POST['fecha_inicio'], $_POST['fecha_fin'] ]);
  flash('ok','Proyecto registrado');
}catch(Throwable $e){ flash('err','Error: '.$e->getMessage()); }
header('Location: project_form.php');