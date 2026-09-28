# Sistema Solar · HTML5, PHP y SQLite

Práctica modernizada desde las dos bases remotas:

- `html5-base`: `https://github.com/rodrigosambadesaa/lmsgi-sistema-solar-html5.git`
- `css3-base`: `https://github.com/rodrigosambadesaa/lmsgi-sistema-solar-html5-css3.git`

La versión funcional usa PHP 8.1+ con PDO SQLite. Al visitar `principal.php`, la aplicación crea automáticamente `data/sistema_solar.sqlite` a partir de `database/schema.sql`.

## Puesta en marcha

```bash
php -S localhost:8000
```

Abre `http://localhost:8000/principal.php` y prueba `contactar.php`. Para producción, sirve el directorio con HTTPS, conserva `data/` fuera del directorio público si es posible y configura permisos de escritura únicamente para ese directorio.

## Seguridad aplicada

- Validación de tipos, longitud, lista blanca y formato en servidor; la validación JavaScript solo mejora la experiencia.
- CSRF con token criptográficamente aleatorio y comparación constante.
- PDO con SQLite, consultas preparadas, restricciones `CHECK` e índices.
- Escape contextual con `htmlspecialchars` para prevenir XSS almacenado/reflejado.
- Cookies `HttpOnly`, `SameSite=Lax`, modo estricto de sesión y regeneración mediante patrón POST/Redirect/GET.
- CSP sin `unsafe-inline`, `X-Content-Type-Options`, `X-Frame-Options`, Referrer-Policy, Permissions-Policy y listado de directorios desactivado.
- Rechazo de métodos implícitos: el alta solo acepta `POST` y los datos se validan de nuevo aunque se omita JavaScript.
- Minimización de datos: no se guardan datos innecesarios y el correo se conserva solo para la finalidad de esta práctica.

Consulta `database/modelo-entidad-relacion.md`, `database/modelo-relacional.md` y `database/schema.sql` para los modelos y el esquema.

