<?php
include "../includes/db.php";
$id = $_GET["id"];
$stmt = $db->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header("Location: ../blog.php"); // si no hay resultados
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1TJG3W2PQ0"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-1TJG3W2PQ0');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id=GTM-NJQP2NHS'+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-NJQP2NHS');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lee este artículo">
    <title><?= htmlspecialchars($post["titulo"]) ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link href="../css/index.css" rel="stylesheet">
    <!-- Blog CSS -->
    <link href="../css/blog.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Metadata para previsualización -->
    <meta property="og:title" content="<?= htmlspecialchars(
        $post["titulo"]
    ) ?>" />
    <meta property="og:description" content="Lee este artículo" />
    <meta property="og:image" content="../<?= htmlspecialchars(
        $post["portada"]
    ) ?>" />
    <meta property="og:url" content="https://www.yogaconsandy.cl" />
    <meta property="og:type" content="article" />
    <meta property="article:author" content="https://www.yogaconsandy.cl/index.html#sec-1" />
    <meta property="article:published_time" content="<?= $post[
        "fecha_publicacion"
    ] ?>" />
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJQP2NHS"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top" aria-label="Navegación principal">
            <div class="container-fluid">
                <!-- Logo/Marca del sitio -->
                <a class="navbar-brand" href="../index.html">
                    <img src="../imagenes/logo.png" alt="Logo Yoga con Sandy" title="Logo Yoga con Sandy" style="max-height: 4rem; width: auto;">
                </a>
                <!-- Botón para el menú móvil -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menú de navegación -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="../index.html" class="nav-link active" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item"> 
                            <a data-easing="easeInOutQuad" href="../index.html#sec-1" class="nav-link">Acerca de mi</a>
                        </li>
                        <!-- Deshabilitado-->
                        <!-- <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="index.html#sec-2" class="nav-link">Instagram</a>
                        </li> -->
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="../index.html#sec-3" class="nav-link">Clases</a>
                        </li>
                        <!-- Deshabilitado-->
                        <!-- <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="index.html#sec-4" class="nav-link">Testimonios</a>
                        </li> -->
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="../index.html#sec-5" class="nav-link">Preguntas frecuentes</a>
                        </li>
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="../blog.php" class="nav-link">Blog</a>
                        </li>
                        <!-- Deshabilitado-->
                        <!--<li class="nav-item">
                            <a data-easing="easeInOutQuad" href="../nuevo-post.php" class="nav-link">Crear nuevo post</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <main>
            <article class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <header class="mb-4">
                                <div class="post-meta mb-3">
                                <?php
                                $fecha = $post["fecha_publicacion"];
                                setlocale(
                                    LC_TIME,
                                    "es_ES.UTF-8",
                                    "es_ES",
                                    "Spanish_Spain",
                                    "es"
                                );
                                #setlocale(LC_TIME, 'es_ES.UTF-8'); // Para entornos Linux con soporte en español
                                $date = new DateTime($fecha);
                                ?>
                                    <span><i class="bi bi-calendar"></i> <?= strftime(
                                        "%e de %B, %Y",
                                        $date->getTimestamp()
                                    ) ?></span>
                                    <span class="ms-3"><i class="bi bi-clock"></i> <?= $post[
                                        "tiempo_lectura"
                                    ] ?> min de lectura</span>
                                </div>
                                <h1 class="mb-4"><?= htmlspecialchars(
                                    $post["titulo"]
                                ) ?></h1>
                                <div class="post-tags mb-4">
                                    <span class="tag">Yoga</span>
                                </div>
                                <?php if (!empty($post["portada"])): ?>
                                <img src="../<?= htmlspecialchars(
                                    $post["portada"]
                                ) ?>" class=" img-fluid rounded mb-4" alt="Portada" title="Portada">
                                <?php endif; ?>
                            </header>

                            <div class="post-content">
                                <article>                        
                                    <p><?= $post["html"] ?></p>
                                  </article>
                                                            
                            </div>
                        </div>
                    </div>
        </article>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <?php
                    $stmt = $db->prepare(
                        "SELECT autor, contenido, fecha FROM comentarios WHERE post_id = ? ORDER BY fecha DESC"
                    );
                    $stmt->execute([$post["id"]]);
                    $comentarios = $stmt->fetchAll();
                    ?>

                    <h4>Únete a la conversación:</h4>
                    <form action="procesar_comentario.php" method="POST">
                        <input type="hidden" name="post_id" value="<?= $post[
                            "id"
                        ] ?>">
                        <div class="mb-2">
                            <input type="text" name="autor" class="form-control" placeholder="Tu nombre" required>
                        </div>
                        <div class="mb-2">
                            <textarea name="contenido" class="form-control" placeholder="Escribe tu comentario..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-1 btn-sm">Enviar comentario</button>
                    </form>
                    <br>

                    <h4>Comentarios:</h4>
                    <?php foreach ($comentarios as $c): ?>
                    <div class="mb-3 border p-2 rounded comentarios">
                        <?php
                        $fechaComentario = $c["fecha"];
                        setlocale(
                            LC_TIME,
                            "es_ES.UTF-8",
                            "es_ES",
                            "Spanish_Spain",
                            "es"
                        );
                        #setlocale(LC_TIME, 'es_ES.UTF-8'); // Para entornos Linux con soporte en español
                        $date = new DateTime($fechaComentario);
                        ?>
                        <strong><?= htmlspecialchars(
                            $c["autor"]
                        ) ?></strong> <em><?= strftime(
    "%e de %B, %Y - %H:%M",
    $date->getTimestamp()
) ?></em>
                        <p><?= nl2br(htmlspecialchars($c["contenido"])) ?></p>
                    </div>
                    <?php endforeach; ?>
                    
                    

                    <!-- Pie de página para artículos del blog-->
                    <footer class="mt-5 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Sígueme en</h5>
                                <div class="social-share mt-2">
                                    <a href="https://www.instagram.com/yogaconsandy/"><i class="bi bi-instagram"></i></a>
                                    <a href="https://www.facebook.com/ShaktiYogaCuracavi"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.linkedin.com/in/sandy-tamara-arce-palacios-16b125149/"><i class="bi bi-linkedin"></i></a>
                                    <a href="https://www.youtube.com/@Yogaconsandy"><i class="bi bi-youtube"></i></a>
                                </div>
                            </div>
                            <a href="../blog.php" class="btn btn-1 btn-sm">
                                <i class="bi bi-arrow-left"></i> Volver al blog
                            </a>
                        </div>
                    </footer>
                </div>    
            </div>
        </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
