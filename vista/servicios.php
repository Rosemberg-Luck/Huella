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

    <title>Servicios</title>
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
                        <a class="nav-link cw" href="../controladores/noticiasController.php" id="navbar">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link green" href="../controladores/serviciosController.php" id="navbar">Servicios</a>
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
            <div class="row px-3">
                <h1 class="font-weight-bold cw">Servicios</h1>
            </div>
            <div class="row">
                <div class="col-md-9">

                </div>
                <div class="col-md-3">
                    <form action="../controladores/serviciosController.php" method="POST" class="d-flex position-relative">

                        <input name="search" class="form-control mr-2 bg-grey border text-center" type="search" placeholder="Buscar servicio" aria-label="Search">
                        <button type="button" class="btn btn-link text-muted position-absolute" disabled><i class="icon ion-md-search lead"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    //For para mostrar servicios
    for ($i = 0; $i < count($listaServicios); $i++) {
    ?>
        <div class="container mt-2">
            <div class='row'>
                <div class='col-md-8'>
                    <div class='card card-b inicio px-2 '>
                        <p class='my-1'>
                            <span class="font-weight-bold ">Servicio:</span>
                            <?php echo $listaServicios[$i]["nombre"]; ?>
                        </p>
                        <p class='my-1'>
                            <span class="font-weight-bold ">
                            Precio: 
                            </span>
                            <?php echo   "$".$listaServicios[$i]["precio"] . " pesos mexicanos"; ?>
                        </p>
                        <p class='font-weight-bold my-1'>Descripción del servicio:
                        </p>
                        <p class="my-1 "align="justify">
                            <?php echo $listaServicios[$i]["descripcion"]; ?>
                        </p>
                        <img class="img rounded img-center d-block" src="<?php echo $listaServicios[$i]["rutaImagen"]; ?>">
                        <a target="_blank" href="<?php echo $listaServicios[$i]["rutaArchivo"]; ?>" class="inicio font-weight-bold my-1">Para saber más, dar click aquí</a>
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