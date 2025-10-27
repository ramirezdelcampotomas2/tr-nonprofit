# Informe – Semana 5 (Sesiones en PHP)
## Actividad 1: Medidas específicas (sesiones + seguridad)
- **Cookies de sesión seguras**: `session_set_cookie_params([... 'httponly'=>true, 'samesite'=>'Lax', 'secure'=>HTTPS])`. Protege contra robo vía JS y reduce CSRF (SameSite).
- **Prevención de fijación de sesión**: `session_regenerate_id(true)` al inicio/acciones críticas. Solo aceptamos IDs emitidos por el servidor.
- **CSRF tokens + POST**: campo oculto `csrf` con verificación server-side; no almacenamos información sensible del donante en sesión (solo ids/montos).

## Actividad 2: Evitar expiración prematura
- **Configuración de vida**: `session_set_cookie_params(lifetime)` y `session.gc_maxlifetime` (php.ini) para coherencia cliente/servidor.
- **Renovación por actividad**: timestamp `__last_activity` y endpoint `keepalive.php` (ping JS cada 5 min).
- **Uso correcto de API**: `session_status`, `session_write_close` solo cuando corresponda; no destruir/cerrar sesión accidentalmente.

## Actividad 3: Prototipo de carrito de donaciones con sesiones
- **HTML**: botones “Agregar al carrito” en Proyectos (POST).
- **PHP**: `$_SESSION['donation_cart']` para mantener estado; rutas `cart.php`, `cart_add.php`, `cart_remove.php`, `cart_clear.php`, `checkout.php`.
Incluye capturas de: carrito con ítems, vaciado, finalización y notificaciones.

(Ver código dentro del proyecto y explica brevemente cada archivo.)