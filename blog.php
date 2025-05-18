<?php
include 'includes/db.php';
$posts = $db->query("SELECT * FROM posts ORDER BY fecha_publicacion DESC");
$postDestacado = $db->query("SELECT * FROM posts where id = (SELECT MAX(id) FROM posts)");
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
    <meta name="description" content="Yoga con Sandy - Blog">
    <title>Yoga con Sandy - Blog</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link href="css/index.css" rel="stylesheet">
    <!-- Blog CSS -->
    <link href="css/blog.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                <a class="navbar-brand" href="index.html">
                    <img src="imagenes/logo.png" alt="Logo Yoga con Sandy" title="Logo Yoga con Sandy" style="max-height: 4rem; width: auto;">
                </a>
                <!-- Botón para el menú móvil -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menú de navegación -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="index.html" class="nav-link active" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item"> 
                            <a data-easing="easeInOutQuad" href="index.html#sec-1" class="nav-link">Acerca de mi</a>
                        </li>
                        <!-- Deshabilitado-->
                        <!-- <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="index.html#sec-2" class="nav-link">Instagram</a>
                        </li> -->
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="index.html#sec-3" class="nav-link">Clases</a>
                        </li>
                        <!-- Deshabilitado-->
                        <!-- <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="index.html#sec-4" class="nav-link">Testimonios</a>
                        </li> -->
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="index.html#sec-5" class="nav-link">Preguntas frecuentes</a>
                        </li>
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="blog.html" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a data-easing="easeInOutQuad" href="nuevo-post.php" class="nav-link">Crear nuevo post</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="blog-header">
            <!-- Imagen de fondo con opacidad -->
            <div class="background-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: url('imagenes/fondo1.jpg'); background-size: cover; background-position: center; opacity: 0.85; z-index: -1;"></div>
        
            <div class="container">
                <h1>Blog2: Yoga con Sandy</h1>
                <p class="lead">Yoga, maternidad, autismo, emprendimiento</p>
                <!--<div class="search-container">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar artículos..." aria-label="Buscar artículos">
                        <button class="btn btn-outline-light" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div> -->
            </div>
        </section>

        <section class="container">
        <?php $postData = $postDestacado->fetch(PDO::FETCH_ASSOC); ?>
            <div class="row">
                <!-- Artículo destacado -->
                <div class="col-12 mb-5">
                    <div class="card blog-post">
                        <div class="card-body">
                            <div class="post-meta mb-2">
                                <span><i class="bi bi-calendar"></i> 12 de mayo, 2025</span>
                                <span class="ms-3"><i class="bi bi-clock"></i> 7 min de lectura</span>
                            </div>
                            <h2 class="card-title">
                                <a href="posts/post.php?id=<?= $postData['id'] ?>"class="text-decoration-none"><?= htmlspecialchars($postData['titulo']) ?></a>
                            </h2>
                            <?php
                                $html = $postData['html'];
                                preg_match('/<p>(.*?)<\/p>/s', $html, $matches)// Obtiene el primer párrafo completo con etiqueta <p>
                            ?>

                            <p class="card-text"><?= $matches[0] ?></p>
                            <br>
                            <?php if (!empty($postData['portada'])): ?>
                            <img src="<?= htmlspecialchars($postData['portada']) ?>" class="img-fluid rounded mb-4 card-img-top" alt="Portada" title="Portada">
                            <?php endif; ?>
                        
                            <div class="post-tags">
                                <span class="tag">Transformación</span>
                                <span class="tag">Sanación</span>
                            </div>
                            <br>
                            <a href="posts/post.php?id=<?= $postData['id'] ?>" class="btn btn-2 btn-lg">Leer más</a>
                        </div>
                    </div>
                </div>

                <!-- Artículos recientes -->


                <?php foreach ($posts as $post): ?>        
                <div class="col-md-6 mb-4">
                    <div class="card blog-post h-100">
                        <div class="card-body">
                            <div class="post-meta mb-2">
                                <span><i class="bi bi-calendar"></i> <?= $post['fecha_publicacion'] ?></span>
                                <span class="ms-3"><i class="bi bi-clock"></i> <?= $post['tiempo_lectura'] ?> min de lectura</span>
                            </div>
                            <h3 class="card-title">
                                <a href="posts/post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['titulo']) ?></a>
                            </h3>
                            <?php
                                $html = $post['html'];
                                preg_match('/<p>(.*?)<\/p>/s', $html, $matches)// Obtiene el primer párrafo completo con etiqueta <p>
                            ?>

                            <p class="card-text"><?= $matches[0] ?></p>
                            
                            <br>
                            <?php if (!empty($post['portada'])): ?>
                            <img src="<?= htmlspecialchars($post['portada']) ?>" class=" img-fluid rounded mb-4 card-img-normal" alt="Imagen articulos recientes" title="Imagen articulos recientes">
                            <?php endif; ?>
                            <div class="post-tags">
                                <span class="tag">Yoga</span>
                                <span class="tag">Maternidad</span>
                                <span class="tag">Superación</span>
                            </div>
                            <a href="blog/posts/soy-mama-y-profesora-de-yoga.html" class="btn btn-outline-light mt-3">Leer más</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
              </div>

                <!--
                <div class="col-md-6 mb-4">
                    <div class="card blog-post h-100">
                        <div class="card-body">
                            <div class="post-meta mb-2">
                                <span><i class="bi bi-calendar"></i> 5 de Abril, 2024</span>
                                <span class="ms-3"><i class="bi bi-clock"></i> 4 min de lectura</span>
                            </div>
                            <h3 class="card-title h5">Inteligencia Artificial en el Desarrollo de Software</h3>
                            <p class="card-text">Cómo la IA está transformando el proceso de desarrollo de software y qué herramientas están disponibles.</p>
                            <div class="post-tags">
                                <span class="tag">IA</span>
                                <span class="tag">Desarrollo</span>
                            </div>
                            <a href="#" class="btn btn-outline-light mt-3">Leer más</a>
                        </div>
                    </div>
                </div>
                -->
            </div>
            
            <!-- Paginación -->
            <!--<nav aria-label="Navegación de páginas" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>-->
        </section>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 
