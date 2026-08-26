# Sistema Solar — migración de HTML 4 a HTML5

Modernización de una práctica de **Lenguajes de Marcas** realizada en 2017.

## Modernización

- `<!doctype html>`, UTF-8, `lang="es"` y `viewport`.
- Estructura semántica con `header`, `nav`, `main`, `section`, `article`, `footer`, `form`, `label` y `textarea`.
- Se elimina la maquetación mediante tablas y los elementos/atributos presentacionales de HTML 4 (`font`, `background`, `align`, `text`, `link`, `vlink`, etc.).
- CSS responsive con Grid/Flexbox, variables fluidas y foco accesible.
- Los antiguos recursos raster se sustituyen en la versión moderna por representaciones CSS autocontenidas, evitando dependencias binarias.
- El formulario usa validación HTML5 y no envía datos a un backend inexistente.

El contenido se mantiene como referencia histórica de la práctica; la revisión se centra en el código web.

## Ejecutar

```bash
python -m http.server 8000
```

Abra `http://localhost:8000`.
