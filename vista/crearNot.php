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

    <title>Nueva noticia</title>
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
        <div class="container my-4">
            <div>
                <h1 class="font-weight-bold cw text-center">Crear noticia</h1>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card inicio px-2" id="estilo1">
                        <div class="text-center">

                            <img class="alternative" src="../img/noticias/noticias-icon.png" width="150">
                        </div>
                        <form action="../controladores/crearNotController.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><label class=" cw font-weight-bold px-2 py-2"> Nombre de la noticia:</label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-8">
                                    <input type="text" name="nombrenoticia" class="form-control px-2" size="40" placeholder="Noticia" required="yes">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-3"><label class=" cw font-weight-bold px-2 py-2 mr-3">Descripcion:</label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-8">
                                    <textarea required name="descripcion" class="form-control size " placeholder="Descrición de la noticia" style="border: none;" wrap="soft"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-7"><label class=" cw font-weight-bold px-2 py-2"> Link:</label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-8">
                                    <input type="text" name="rutaArchivo" class="form-control px-2" size="40" placeholder="URL" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-4"><label class="cw font-weight-bold ">Categoria:</label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <select require name="filtro" class="form-control">
                                        <option name="categoria" value="Anuncio">Anuncio</option>
                                        <option name="categoria" value="Evento">Evento</option>
                                        <option name="categoria" value="Promocion">Promocion</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-8">
                                            <div class="form-group cw">
                                                <label for="exampleFormControlFile1">Imagen del noticia</label>
                                                <input name="rutaImagen" type="file" accept="image/*" class="form-control-file" id="exampleFormControlFile1" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-5">
                                            <button id="boton" type="submit" class="cw btn btn-outline-secondary text-decoration-none" name="crear">Crear noticia</button>
                                        </div>
                                    </div>
                                    <div class="row py-2"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <p class="font-weight-bold text-center Confirm mt-2 mr-5"><?php echo $mensaje; ?></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


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