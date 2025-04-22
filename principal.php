

<?php
session_start();
/*
if ($_SESSION["nomina"] == "" && $_SESSION["nomina"] == null) {
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=index.html'>";
    session_destroy();
} else {
    session_start();
}*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/Grammer_Logo.ico" type="image/x-icon">
    <title>Work Force Grammovil</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
</head>
<body class="vertical  light  ">
<div class="wrapper">
    <?php
    require_once('estaticos/navegador.php');
    ?>
    <main role="main" class="main-content">

        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-12">

                    <div class="card shadow my-4">
                        <div class="card-body">
                            <div class="row align-items-center my-4">
                                <div class="col-md-5">
                                    <div class="mx-4">
                                        <strong class="mb-0 text-uppercase text-muted">Bienvenido</strong><br />
                                        <h3 id="txtNombre">Hadbet Ayari Altamirano Martinez</h3>
                                        <p class="text-muted">Se mostrara un resumen de su expediente actual como trabajador de grammer</p>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <div class="p-4">
                                                <p class="text-uppercase mb-0">Vacaciones</p>
                                                <span class="h2 mb-0" id="txtVacaciones">10 dias</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="p-4">
                                                <p class="text-uppercase mb-0">Fondo de ahorro</p>
                                                <span class="h2 mb-0" id="txtFondoAhorro">$70000</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <div class="p-4">
                                                <p class="text-uppercase mb-0">Caja de ahorro</p>
                                                <span class="h2 mb-0" id="txtCajaAhorro">$8000</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="p-4">
                                                <p class="text-uppercase mb-0">Pendiente Prestamo</p>
                                                <span class="h2 mb-0" id="txtPendientePrestamo">$10</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="mr-4">
                                        <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- .col-md-8 -->
                            </div> <!-- end section -->
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->

                </div>


                    <div class="col-md-4">
                        <div class="card shadow bg-primary text-center mb-4">
                            <div class="card-body p-5">
                      <span class="circle circle-md bg-primary-light">
                        <i class="fe fe-sun fe-24 text-white"></i>
                      </span>
                                <h3 class="h4 mt-4 mb-1 text-white">Peticion de vacaciones</h3>
                                <p class="text-white mb-4">Plataforma para peticion de vacaciones unicamente personal de produccion.</p>
                                <a href="principal.php" class="btn btn-lg bg-primary-light text-white">Solicitar<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col-md-->

                    <div class="col-md-4">
                        <div class="card shadow bg-success text-center mb-4">
                            <div class="card-body p-5">
                      <span class="circle circle-md bg-success-light">
                        <i class="fe fe-thumbs-up fe-24 text-white"></i>
                      </span>
                                <h3 class="h4 mt-4 mb-1 text-white">Suggestion System</h3>
                                <p class="text-white mb-4">Plataforma para subir ideas de ahorro, tiempo, ergonomicos y de calidad, al igual que recomendaciones</p>
                                <a href="https://grammermx.com/GPS/idea/IOS/login.php" class="btn btn-lg bg-success-light text-white">Agregar Idea<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col-md-->

                <div class="col-md-4">
                    <div class="card shadow bg-info text-center mb-4">
                        <div class="card-body p-5">
                      <span class="circle circle-md bg-info-light">
                        <i class="fe fe-dollar-sign fe-24 text-white"></i>
                      </span>
                            <h3 class="h4 mt-4 mb-1 text-white">Caja de ahorro y prestamos</h3>
                            <p class="text-white mb-4">Plataforma de registros de caja de ahorro, consulta y retiro de ella, al igual que para prestamos.</p>
                            <a href="https://grammermx.com/RH/CajaDeAhorro/login.php" class="btn btn-lg bg-info-light text-white">Entrar<i class="fe fe-arrow-right fe-16 ml-2"></i></a>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div> <!-- .col-md-->


                <div class="col-md-6">
                    <h1 class="h2 mb-4">Reportes con RH</h1>
                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4 col-md-2 text-center">
                                    <a href="profile-posts.html" class="avatar avatar-md">
                                        <img src="https://grammermx.com/Fotos/00001540.png" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col">
                                    <strong class="mb-1">Paola Noguez</strong><span class="dot dot-lg bg-success ml-1"></span>
                                    <p class="small text-muted mb-1">RH - Atencion a comunicados de la pagina</p>
                                </div>
                                <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                    <a href="#!" class="btn btn-sm btn-secondary">Contact</a>
                                </div>
                            </div>
                        </div> <!-- / .card-body -->
                    </div> <!-- / .card -->


                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4 col-md-2 text-center">
                                    <a href="profile-posts.html" class="avatar avatar-md">
                                        <img src="https://grammermx.com/Fotos/00001227.png" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col">
                                    <strong class="mb-1">Perla Martinez</strong><span class="dot dot-lg bg-success ml-1"></span>
                                    <p class="small text-muted mb-1">RH - Atencion entrenamiento y capcitacion de las capsulas de la pagina</p>
                                </div>
                                <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                    <a href="#!" class="btn btn-sm btn-secondary">Contact</a>
                                </div>
                            </div>
                        </div> <!-- / .card-body -->
                    </div> <!-- / .card -->


                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4 col-md-2 text-center">
                                    <a href="profile-posts.html" class="avatar avatar-md">
                                        <img src="https://grammermx.com/Fotos/00001555.png" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col">
                                    <strong class="mb-1">Roberto Arreola</strong><span class="dot dot-lg bg-success ml-1"></span>
                                    <p class="small text-muted mb-1">RH - Atencion a nominas y caja de ahorro de la pagina.</p>
                                </div>
                                <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                    <a href="#!" class="btn btn-sm btn-secondary">Contact</a>
                                </div>
                            </div>
                        </div> <!-- / .card-body -->
                    </div> <!-- / .card -->


                </div> <!-- / .col- -->


                <div class="col-md-6">
                    <h1 class="h2 mb-4">Reporte Generales</h1>

                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4 col-md-2 text-center">
                                    <a href="profile-posts.html" class="avatar avatar-md">
                                        <img src="https://grammermx.com/Fotos/00001606.png" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col">
                                    <strong class="mb-1">Hadbet Altamirano</strong><span class="dot dot-lg bg-success ml-1"></span>
                                    <p class="small text-muted mb-1">IT - Atencion del soporte web y desarrollo.</p>
                                </div>
                                <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                    <a href="#!" class="btn btn-sm btn-secondary">Contact</a>
                                </div>
                            </div>
                        </div> <!-- / .card-body -->
                    </div> <!-- / .card -->

                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4 col-md-2 text-center">
                                    <a href="profile-posts.html" class="avatar avatar-md">
                                        <img src="https://grammermx.com/Fotos/00001818.png" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col">
                                    <strong class="mb-1">Erick Duran</strong><span class="dot dot-lg bg-success ml-1"></span>
                                    <p class="small text-muted mb-1">GPS - Atencion a ideas de mejora suggestion system</p>
                                </div>
                                <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                    <a href="#!" class="btn btn-sm btn-secondary">Contact</a>
                                </div>
                            </div>
                        </div> <!-- / .card-body -->
                    </div> <!-- / .card -->


                </div> <!-- / .col- -->

            </div>
        </div>

    </main> <!-- main -->
</div> <!-- .wrapper -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src='js/daterangepicker.js'></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src="js/tinycolor-min.js"></script>
<script src="js/config.js"></script>
<script src="js/apps.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $.getJSON('https://grammermx.com/RH/GrammovilApp/inicio/dao/DaoUsuario.php?usuario=<?php echo $_SESSION["nomina"];?>', function (data) {
        var text = data.data[0].NomUser;
        const myArray = text.split(" ");
        let word = myArray[0] + ' ' + myArray[1];
        document.getElementById('txtNombre').innerHTML = text;
        tag = data.data[0].IdTag;
        orden(data.data[0].IdTag);
    });

    function orden(tag) {
        $.getJSON('https://grammermx.com/RH/GrammovilApp/inicio/dao/DaoVacaciones.php?usuario=' + tag, function (data) {
            document.getElementById('txtVacaciones').innerHTML = data.data[0].DiasVacaciones;

            var fechaAux = data.data[0].FechaIngreso;
            let divicionFecha = fechaAux.split('-');
            ano = divicionFecha[0];
            mes = divicionFecha[1];
            dia = divicionFecha[2];

            if (mes == '01') {
                mes = 'enero';
            }
            if (mes == '02') {
                mes = 'febrero';
            }
            if (mes == '03') {
                mes = 'marzo';
            }
            if (mes == '04') {
                mes = 'abril';
            }
            if (mes == '05') {
                mes = 'mayo';
            }
            if (mes == '06') {
                mes = 'junio';
            }
            if (mes == '07') {
                mes = 'julio';
            }
            if (mes == '08') {
                mes = 'agosto';
            }
            if (mes == '09') {
                mes = 'septiembre';
            }
            if (mes == '10') {
                mes = 'octubre';
            }
            if (mes == '11') {
                mes = 'noviembre';
            }
            if (mes == '12') {
                mes = 'diciembre';
            }

            //document.getElementById('txt').innerHTML = dia + " de " + mes + " del " + ano;
        });

        $.getJSON('https://grammermx.com/RH/GrammovilApp/inicio/dao/DaoCajaAhorro.php?usuario=' + tag, function (data) {

            document.getElementById('txtCajaAhorro').innerHTML = data.data[0].AhorroTotal;
            document.getElementById('txtPendientePrestamo').innerHTML = data.data[0].PendientePrestamo;
            document.getElementById('txtFondoAhorro').innerHTML = data.data[0].FondoAhorro;
        });
    }



    document.addEventListener('DOMContentLoaded', function() {
        const carouselInner = document.querySelector('.carousel-inner');
        const imageCount = 10; // Número total de imágenes (1.jpg a 10.jpg)
        const imagePath = 'assets/images/carrusel/'; // Ajusta esta ruta según tu estructura de carpetas

        // Generar los elementos del carrusel
        for (let i = 1; i <= imageCount; i++) {
            const div = document.createElement('div');
            div.className = `carousel-item ${i === 1 ? 'active' : ''}`;

            const img = document.createElement('img');
            img.src = `${imagePath}${i}.jpg`;
            img.alt = `Imagen ${i}`;
            img.className = 'd-block w-100 rounded-circle';
            img.style.width = '100%';
            img.style.height = 'auto';
            img.style.objectFit = 'cover';

            div.appendChild(img);
            carouselInner.appendChild(div);
        }

        // Configurar el cambio automático cada 3 segundos (3000 ms)
        $('.carousel').carousel({
            interval: 3000
        });
    });
</script>
</body>
</html>