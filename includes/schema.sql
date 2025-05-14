
CREATE TABLE posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    cuerpo TEXT NOT NULL,
    html TEXT NOT NULL,
    tiempo_lectura INTEGER,
    fecha_publicacion TEXT
);

CREATE TABLE etiquetas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL UNIQUE
);

CREATE TABLE post_etiquetas (
    post_id INTEGER,
    etiqueta_id INTEGER,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (etiqueta_id) REFERENCES etiquetas(id) ON DELETE CASCADE,
    PRIMARY KEY (post_id, etiqueta_id)
);
