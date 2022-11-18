<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon/IconAltosAndes.png" type="image/x-icon">

    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <title>Altos de los Andes</title>
</head>

<body class="body-bienvenida">

    <div class="inicio">

        <div class="row tit-inicio">

            <h1>
                <img src="img/icon/IconAltosAndes.png" alt="Clinica Altos de los Andes">
                Clinica Altos de los Andes
            </h1>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="cont-carousel">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/carrusel/img1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/carrusel/img2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/carrusel/img3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="cont-formLogin">
                    <form>
                        <h1>Ingresar</h1>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo: </label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="sucorreo@correo.com">
                        </div>
                        <div class="mb-3">
                            <label for="clave" class="form-label">Contraseña: </label>
                            <input type="password" class="form-control" id="clave" placeholder="*********">
                        </div>                        
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>