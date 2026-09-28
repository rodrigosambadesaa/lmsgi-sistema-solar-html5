# Modelo entidad-relación

La aplicación guarda las opiniones enviadas desde el formulario. La entidad `Opinión` representa un envío válido y conserva únicamente los datos necesarios para atender la práctica.

```mermaid
erDiagram
    OPINION {
        INTEGER id PK
        TEXT nombre
        TEXT apellidos
        TEXT provincia
        TEXT correo
        INTEGER edad
        TEXT opinion
        TEXT created_at
    }
```

No se modela la navegación de planetas como datos de usuario: son contenido editorial estático y no requieren persistencia.

