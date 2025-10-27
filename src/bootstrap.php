<?php
declare(strict_types=1);

// Secure session cookie
$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
session_set_cookie_params([ 'lifetime'=>60*60, 'path'=>'/', 'secure'=>$https, 'httponly'=>true, 'samesite'=>'Lax' ]);
session_name('ONGSESSID');
session_start();

function e(?string $v): string { return htmlspecialchars($v??'', ENT_QUOTES,'UTF-8'); }
function flash(string $k, ?string $m=null): ?string { if($m===null){ if(!empty($_SESSION['flash'][$k])){$t=$_SESSION['flash'][$k];unset($_SESSION['flash'][$k]);return $t;} return null; } $_SESSION['flash'][$k]=$m; return null; }
function csrf_token(): string { if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function csrf_field(): string { return '<input type="hidden" name="csrf" value="'.e(csrf_token()).'">'; }
function csrf_verify(): bool { return isset($_POST['csrf'],$_SESSION['csrf']) && hash_equals($_SESSION['csrf'], (string)$_POST['csrf']); }

// PDO connection (env vars from docker compose)
function db(): PDO {
  static $pdo = null;
  if ($pdo) return $pdo;
  $host = getenv('DB_HOST') ?: 'db';
  $port = getenv('DB_PORT') ?: '3306';
  $db   = getenv('DB_NAME') ?: 'ORGANIZACION';
  $user = getenv('DB_USER') ?: 'root';
  $pass = getenv('DB_PASS') ?: 'root';
  $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";
  $pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
  return $pdo;
}
