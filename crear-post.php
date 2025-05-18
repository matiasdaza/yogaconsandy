<?php
include 'includes/db.php';
require_once 'includes/Parsedown.php';

$titulo = $_POST['titulo'];
$fecha = $_POST['fecha_publicacion'];
$cuerpo = $_POST['cuerpo'];
$etiquetas_raw = explode(',', $_POST['etiquetas']);
$etiquetas = array_map('trim', $etiquetas_raw);

// Procesar imagen portada
$portada_filename = null;
if (isset($_FILES['portada']) && $_FILES['portada']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $ext = pathinfo($_FILES['portada']['name'], PATHINFO_EXTENSION);
    $portada_filename = $uploadDir . uniqid('post_') . '.' . $ext;
    move_uploaded_file($_FILES['portada']['tmp_name'], $portada_filename);
}

$palabras = str_word_count(strip_tags($cuerpo));
$tiempo_lectura = ceil($palabras / 200);

$Parsedown = new Parsedown();
$html = $Parsedown->text($cuerpo);

// Insertar post
$stmt = $db->prepare("INSERT INTO posts (titulo, cuerpo, html, tiempo_lectura, fecha_publicacion, portada) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$titulo, $cuerpo, $html, $tiempo_lectura, $fecha, $portada_filename]);
$post_id = $db->lastInsertId();

// Manejar etiquetas
foreach ($etiquetas as $etiqueta) {
    if (empty($etiqueta)) continue;
    $stmt = $db->prepare("SELECT id FROM etiquetas WHERE nombre = ?");
    $stmt->execute([$etiqueta]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $etiqueta_id = $row['id'];
    } else {
        $stmt = $db->prepare("INSERT INTO etiquetas (nombre) VALUES (?)");
        $stmt->execute([$etiqueta]);
        $etiqueta_id = $db->lastInsertId();
    }
    $stmt = $db->prepare("INSERT INTO post_etiquetas (post_id, etiqueta_id) VALUES (?, ?)");
    $stmt->execute([$post_id, $etiqueta_id]);
}

header("Location: blog.php");
exit;
?>
