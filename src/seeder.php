<?php
require_once __DIR__.'/bootstrap.php';
$pdo = db();
$pdo->beginTransaction();
try {
  $pairs = [
    [5000, '2025-10-10', 1, 1],
    [7000, '2025-10-11', 1, 2],
    [9000, '2025-10-12', 1, 3],
    [4000, '2025-10-13', 2, 1],
    [4000, '2025-10-14', 2, 2],
    [4500, '2025-10-15', 2, 3],
    [6000, '2025-10-16', 3, 1],
    [6000, '2025-10-17', 3, 2],
    [6000, '2025-10-18', 3, 3],
    [12000,'2025-10-19', 1, 1]
  ];
  $stmt = $pdo->prepare("INSERT INTO DONACION (monto, fecha, id_proyecto, id_donante) VALUES (?,?,?,?)");
  foreach($pairs as $r){ $stmt->execute($r); }
  $pdo->commit();
  echo "Se insertaron 10 donaciones de prueba.";
} catch(Throwable $e){
  $pdo->rollBack();
  echo "Error: ".$e->getMessage();
}
