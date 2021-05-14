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

    <title>Home admin</title>
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
                        <a class="nav-link cw" href="../controladores/registroController.php" id="navbar">Registrar nueva cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/accountController.php" id="navbar">Editar cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/notAdminController.php" id="navbar">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/servAdminController.php" id="navbar">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/cerrar.php" id="navbar">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="py-6">

    </section>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h1 class="cw">¡Bienvenido administrador!</h1>
                <br>
                <p class="cw"> En esta página podrás editar todos los contenidos y servicios, utiliza la barra de navegación para
                    dirigirte a lo que quieras crear, editar o eliminar!
                    <br>
                    </p>
                    
                <p class="cw ">
                    Instrucciones:
                    <li class="cw py-1">
                        Si desea crear un nuevo administrador, vaya al menú de arriba y de clic "Registrar nueva cuenta"
                    </li>
                    <li class="cw py-1">
                        Si desea cambiar su contraseña, vaya al menú de arriba y de clic en "Editar cuenta"
                    </li>
                    <li class="cw py-1">
                        Si desea administrar las noticias, vaya al menú de arriba y de clic en "Noticias"
                    </li>
                    <li class="cw py-1">
                        Si desea administrar los servicios, vaya al menú de arriba y de clic en "Servicios"
                    </li>
                    <li class="cw py-1">
                        Si desea salir de la administración, vaya al menú de arriba y de clic en "Cerrar sesión"
                    </li>

                </p>
                <br>
                <hr color="white" width="auto">

                <div class="col-md-4">

                </div>
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