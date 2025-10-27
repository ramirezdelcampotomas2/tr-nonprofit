<?php
require_once __DIR__.'/bootstrap.php';
if($_SERVER['REQUEST_METHOD']!=='POST' || !csrf_verify()){ flash('err','Solicitud inválida'); header('Location: donation_form.php'); exit; }
try{
  $pdo = db();
  $stmt = $pdo->prepare("INSERT INTO DONACION (monto, fecha, id_proyecto, id_donante) VALUES (?,?,?,?)");
  $stmt->execute([ $_POST['monto'], $_POST['fecha'], $_POST['id_proyecto'], $_POST['id_donante'] ]);
  flash('ok','Donación registrada');
}catch(Throwable $e){ flash('err','Error: '.$e->getMessage()); }
header('Location: donation_form.php');