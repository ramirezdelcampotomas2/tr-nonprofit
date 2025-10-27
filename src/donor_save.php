<?php
require_once __DIR__.'/bootstrap.php';
if($_SERVER['REQUEST_METHOD']!=='POST' || !csrf_verify()){ flash('err','Solicitud inválida'); header('Location: donor_form.php'); exit; }
try{
  $pdo = db();
  $stmt = $pdo->prepare("INSERT INTO DONANTE (nombre,email,direccion,telefono) VALUES (?,?,?,?)");
  $stmt->execute([ $_POST['nombre'], $_POST['email'], $_POST['direccion'] ?? '', $_POST['telefono'] ?? '' ]);
  flash('ok','Donante registrado');
}catch(Throwable $e){ flash('err','Error: '.$e->getMessage()); }
header('Location: donor_form.php');