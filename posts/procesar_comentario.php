<?php
include '../includes/db.php'; // tu conexión PDO

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $post_id = $_POST['post_id'];
  $autor = trim($_POST['autor']);
  $contenido = trim($_POST['contenido']);

  if ($autor && $contenido) {
    $stmt = $db->prepare("INSERT INTO comentarios (post_id, autor, contenido) VALUES (?, ?, ?)");
    $stmt->execute([$post_id, $autor, $contenido]);
  }

  header("Location: post.php?id=" . $post_id);
  exit;
}
?>
