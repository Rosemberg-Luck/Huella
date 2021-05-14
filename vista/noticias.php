<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link href="../css/styles.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Noticias</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" id="estilo1">
        <div class="container">
            <h1 class="cw"><i class="icon-hand ion-ios-hand lead"></i>Huella</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="cw icon ion-md-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/homeController.php" id="navbar">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/portafolioController.php" id="navbar">Portafolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link green" href="../controladores/noticiasController.php" id="navbar">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/serviciosController.php" id="navbar">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/contactoController.php" id="navbar">Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/loginController.php" id="navbar">Cuenta admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="py-6">
        <div class="container">

            <div class="row">
                <h1 class="font-weight-bold cw px-4">Noticias</h1>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label class="font-weight-bold px-2 cw filtro">Filtrar por categoria:</label>
                </div>
                <div class="col-md-3">
                    <form name="formFiltro" action="../controladores/noticiasController.php" method="POST">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <select name="filtro" class="form-control">
                                    <option name="categoria" value="Ninguno">Ningun filtro</option>
                                    <option name="categoria" value="Anuncio">Anuncio</option>
                                    <option name="categoria" value="Evento">Evento</option>
                                    <option name="categoria" value="Promocion">Promoción</option>
                                </select><br>
                            </div>
                            <div>
                                <button id="boton" type="submit" class="cw btn btn-outline-secondary text-decoration-none mx-2" name="filtroenviar">Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">

                </div>

                <div class="col-md-3">
                    <form action="../controladores/noticiasController.php" method="POST" class="d-flex position-relative" id="buscador">
                        <input name="search" class="form-control mr-2 bg-grey border text-center" type="search" placeholder="Buscar noticia" aria-label="Search">
                        <button type="button" class="btn btn-link text-muted position-absolute" disabled><i class="icon ion-md-search lead"></i></button>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <?php
    //For para mostrar noticias
    for ($i = 0; $i < count($listaNoticias); $i++) {
    ?>
        <div class="container mt-2">
            <div class='row'>
                <div class='col-md-8'>
                    <div class='card card-b px-2'>
                        <p class='my-1'>
                            <span class="font-weight-bold ">Noticia:</span>
                            <?php echo $listaNoticias[$i]["nombre"]; ?>
                        </p>
                        <p class="my-1">
                            <span class="font-weight-bold">Fecha de publicación: </span>
                            <?php
                            $año = substr($listaNoticias[$i]['fecha'], 0, 4);
                            $mes = substr($listaNoticias[$i]['fecha'], 5, 2);
                            $dia = substr($listaNoticias[$i]['fecha'], 8, 2);
                            echo $dia . "-" . $mes . "-" . $año;

                            ?>
                        </p>
                        <p class=' my-1'>
                            <span class="font-weight-bold">Categoria:</span>
                            <?php echo $categoriasModel->getCategoriaById($listaNoticias[$i]["idCategoria"]); ?>
                        </p>
                        <p class='font-weight-bold my-1' align=justify>
                            Descripción de la noticia:
                        </p>
                        <span align=justify class="my-1">
                            <?php echo $listaNoticias[$i]["descripcion"]; ?>
                        </span>
                        <img class="img rounded img-center mx-auto d-block" src="<?php echo $listaNoticias[$i]["rutaImagen"]; ?>">
                        <a target="_blank" href="<?php echo $listaNoticias[$i]["rutaArchivo"]; ?>" class="inicio font-weight-bold my-1">Para saber más, dar click aquí</a>
                        <div class="px-2 ">

                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <hr color="white" width="auto">

        </div>
    <?php
    }
    //Fin para mostrar proyectos

    ?>


    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

</body>

</html>