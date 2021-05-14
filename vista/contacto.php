<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link href="../css/styles.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Contacto</title>
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
                        <a class="nav-link cw" href="../controladores/serviciosController.php" id="navbar">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link green" href="../controladores/contactoController.php" id="navbar">Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cw" href="../controladores/loginController.php" id="navbar">Cuenta admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="pt-5">

    </section>

    <div class="container my-5 text-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="cw ">Contacto</h1>
            </div>
        </div>
        <form action="../controladores/contactoController.php" method="POST" class="cw contact" accept-charset="UTF-8">
            <div class="row py-2">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Nombres:</label>
                        <input type="text" class="form-control" name="nombre" id="inlineFormInputGroupUsername" placeholder="Primer nombre, Segundo nombre">
                    </div>
                </div>
                <div class="col-md-4">

                </div>

            </div>
            <div class="row py-2">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <label for="pwd">Apellidos:</label>
                    <input type="text" class="form-control" id="pwd" name="apellido" placeholder="Apellido paterno, Apellido materno">
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Correo electronico:</label>
                        <input type="email" class="form-control" name="email" placeholder="Correo@gmail.com">
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pwd">Número de teléfono:</label>
                        <input type="tel" pattern="[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{4}" class="form-control" name="telefono" maxlength="12" placeholder="000-000-0000" title="Escribir con el formato: 000-000-0000" step="-">
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="cw font-weight-bold "> Motivo:</label>
                        <select require name="filtro" class="form-control">
                            <option name="categoria" value="Servicio">Solicitar servicio</option>
                            <option name="categoria" value="Duda">Dudas y preguntas</option>
                            <option name="categoria" value="Otro">Otro</option>
                        </select>
                    </div>


                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="cw font-weight-bold ">Mensaje:</label>
                        <textarea required name="areacomentario" class="form-control size " placeholder="Mensaje" style="border: none;" wrap="soft"></textarea>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-12">
                    <input id="boton" type="submit" class="cw btn btn-outline-secondary my-2 text-decoration-none" name="contacto" value="Enviar">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold text-center Confirm mt-2 mr-5"><?php echo $mensaje; ?></p>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-12">
                    <h2 class="cw ">Información de contacto</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Número de teléfono:</label>
                        <label for="pwd">921-101-5372 </label>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Correo:</label>
                        <label for="pwd">huellaproductions@gmail.com </label>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </form>




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