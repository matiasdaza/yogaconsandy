<?php include 'includes/db.php'; ?>


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
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
    <div class="container">
      <h1>Nuevo Post</h1>
      <div class="d-flex flex-column flex-md-row align-items-center">
        
        <form action="crear-post.php" method="POST" enctype="multipart/form-data">
          <label>Título:<br><input type="text" name="titulo" required></label><br>
          <label>Fecha de publicación:<br><input type="date" name="fecha_publicacion" required></label><br>
          <label>Etiquetas (separadas por comas):<br><input type="text" name="etiquetas"></label><br>
          <label>Imagen de portada:<br><input type="file" name="portada" accept="image/*"></label><br>
          <label>Contenido:<br><textarea id="markdown" name="cuerpo"></textarea></textarea></label><br>
          <button type="submit">Publicar</button>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <script>
    const easyMDE = new EasyMDE({ element: document.getElementById("markdown") });
    document.querySelector("form").addEventListener("submit", function(e) {
      if (easyMDE.value().trim() === "") {
        alert("El contenido del post no puede estar vacío.");
        e.preventDefault();
      }
    });
  </script>
</body>
</html>
