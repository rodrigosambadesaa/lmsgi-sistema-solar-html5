# Modelo relacional

## OPINIONES

`OPINIONES(id, nombre, apellidos, provincia, correo, edad, opinion, created_at)`

- `id`: clave primaria autoincremental.
- `nombre`, `apellidos`, `provincia`, `correo`, `opinion`: atributos obligatorios con restricciones de longitud.
- `edad`: dominio `{1, 2, 3, 4}` que representa los cuatro intervalos del formulario.
- `created_at`: fecha UTC de alta.

Índices: `idx_opiniones_created_at` para las opiniones recientes y `idx_opiniones_correo` para búsquedas administrativas futuras.

