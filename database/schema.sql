-- Sistema Solar · esquema SQLite
PRAGMA foreign_keys = ON;

CREATE TABLE IF NOT EXISTS opiniones (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL CHECK (length(nombre) BETWEEN 2 AND 60),
    apellidos TEXT NOT NULL CHECK (length(apellidos) BETWEEN 2 AND 100),
    provincia TEXT NOT NULL CHECK (length(provincia) BETWEEN 2 AND 40),
    correo TEXT NOT NULL CHECK (length(correo) BETWEEN 5 AND 254),
    edad INTEGER NOT NULL CHECK (edad BETWEEN 1 AND 4),
    opinion TEXT NOT NULL CHECK (length(opinion) BETWEEN 10 AND 1000),
    created_at TEXT NOT NULL DEFAULT (datetime('now'))
);

CREATE INDEX IF NOT EXISTS idx_opiniones_created_at ON opiniones (created_at DESC);
CREATE INDEX IF NOT EXISTS idx_opiniones_correo ON opiniones (correo);

