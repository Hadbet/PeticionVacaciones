
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/Grammer_Logo.ico">
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
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>

    <style>
        :root {
            --primary: #4a6baf;
            --secondary: #f8f9fa;
            --accent: #ff6b6b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f7fa;
        }

        .calendar-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .calendar-header {
            background: var(--primary);
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .calendar-title {
            margin: 0;
            font-size: 1.5rem;
        }

        .calendar-nav button {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .calendar-nav button:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
            background: #e0e0e0;
        }

        .day-header {
            background: var(--secondary);
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }

        .day-cell {
            min-height: 100px;
            background: white;
            padding: 5px;
            position: relative;
        }

        .day-number {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .event {
            background: var(--accent);
            color: white;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 0.8rem;
            margin-bottom: 2px;
            cursor: pointer;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .other-month {
            background: #f8f9fa;
            color: #aaa;
        }

        .today {
            background-color: #e3f2fd;
        }

        .blocked-day {
            background-color: #ffeaea;
            color: #ff6b6b;
            cursor: not-allowed;
        }

        .future-day {
            background-color: #f0fff0;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            max-width: 90%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .event-counter {
            font-weight: bold;
            padding: 2px;
            border-radius: 3px;
            background-color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
            text-align: right;
            margin-bottom: 5px;
        }

        .day-cell:hover .event-counter {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .alert-info {
            margin-top: 15px;
            border-radius: 5px;
        }

        .blocked-day .event-counter {
            color: #ccc !important;
        }

    </style>

</head>
<body class="vertical  light  ">
<div class="wrapper">
    <?php
    require_once('estaticos/navegador.php');
    ?>
    <main role="main" class="main-content">

        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-md-12 text-center mb-4">
                    <img src="./assets/images/comunicados.png" alt="..." style="width: 70%">
                </div>

                <div class="col-md-6 text-center mt-4 ">
                    <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/2025032108223340124.png" alt="..."  style="width: 100%">
                </div>

                <div class="col-md-6 text-center mt-4 ">
                    <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/20250211113520500632.png" alt="..."  style="width: 100%">
                </div>

                <div class="col-md-6 text-center mt-4 ">
                    <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/20250321082258482261.png" alt="..."  style="width: 100%">
                </div>

                <div class="col-md-6 text-center mt-4 ">
                    <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/20250321082405423513.png" alt="..."  style="width: 100%">
                </div>


                <div class="col-md-12 text-center mt-4">
                    <p class="h1 mb-4">Avisos</p>
                </div>


                <div class="col-md-12 mb-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <strong class="card-title">Logging</strong>
                            <a class="float-right small text-muted" href="#!">View all</a>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush my-n3">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="circle circle-sm bg-warning"><i class="fe fe-shield-off fe-16 text-white"></i></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>11:00 April 16, 2020</strong></small>
                                            <div class="mb-2 text-muted small">Lorem ipsum dolor sit amet, <strong>consectetur adipiscing</strong> elit. Integer dignissim nulla eu quam cursus placerat. Vivamus non odio ullamcorper, lacinia ante nec, blandit leo. </div>
                                            <span class="badge badge-pill badge-warning">Security</span>
                                        </div>
                                        <div class="col-auto pr-0">
                                            <small class="fe fe-more-vertical fe-16 text-muted"></small>
                                        </div>
                                    </div> <!-- / .row -->
                                </div><!-- / .list-group-item -->
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="circle circle-sm bg-success"><i class="fe fe-database fe-16 text-white"></i></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>17:00 April 15, 2020</strong></small>
                                            <div class="mb-2 text-muted small">Proin porta vel erat suscipit luctus. Cras rhoncus felis sed magna commodo, in <a href="#!">pretium</a> mauris faucibus. Cras rhoncus felis sed magna commodo, in pretium mauris faucibus.</div>
                                            <span class="badge badge-pill badge-success">System Update</span>
                                        </div>
                                        <div class="col-auto pr-0">
                                            <small class="fe fe-more-vertical fe-16 text-muted"></small>
                                        </div>
                                    </div> <!-- / .row -->
                                </div><!-- / .list-group-item -->
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="circle circle-sm bg-secondary"><i class="fe fe-user-plus fe-16 text-white"></i></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>17:00 April 10, 2020</strong></small>
                                            <div class="mb-2 text-muted small"> Morbi id arcu convallis, eleifend justo tristique, tincidunt nisl. Morbi euismod fermentum quam, at fringilla elit posuere a. <strong>Aliquam</strong> accumsan mi venenatis risus fermentum, at sagittis velit fermentum.</div>
                                            <span class="badge badge-pill badge-secondary">Users</span>
                                        </div>
                                        <div class="col-auto pr-0">
                                            <small class="fe fe-more-vertical fe-16 text-muted"></small>
                                        </div>
                                    </div> <!-- / .row -->
                                </div><!-- / .list-group-item -->
                            </div> <!-- / .list-group -->
                        </div> <!-- / .card-body -->
                    </div> <!-- / .card -->
                </div> <!-- / .col -->


                <div class="col-md-12 text-center mt-4">
                    <p class="h1 mb-4">Orgullo Grammer</p>
                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-12">
                        <div class="card-body text-center">
                            <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/20250321082216org.jpg" style="width: 80%">
                            <div class="card-text my-2">
                                <strong class="card-title my-0">Roberto Perez</strong>
                                <p class="small"><span class="badge badge-dark">Ingenieria</span></p>
                            </div>
                        </div> <!-- ./card-text -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-md-12 text-center mt-4">
                    <p class="h1 mb-4">Mejores lineas del mes</p>
                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-12">
                        <div class="card-body text-center">
                            <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/20250321082003l1.png" style="width: 100%">
                            <div class="card-text my-2">
                                <strong class="card-title my-0">Foam MFA2 consolas</strong>
                            </div>
                        </div> <!-- ./card-text -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-12">
                        <div class="card-body text-center">
                            <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/20250103101207237499.png" style="width: 100%">
                            <div class="card-text my-2">
                                <strong class="card-title my-0">Suspensiones de MSG 75</strong>
                            </div>
                        </div> <!-- ./card-text -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-12">
                        <div class="card-body text-center">
                            <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/20250321082016959288.png" style="width: 100%">
                            <div class="card-text my-2">
                                <strong class="card-title my-0">BR167 SIDE PANEL</strong>
                            </div>
                        </div> <!-- ./card-text -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-12">
                        <div class="card-body text-center">
                            <img src="https://grammermx.com/RH/GrammovilApp/inicio/images/20250321082041632936.png" style="width: 100%">
                            <div class="card-text my-2">
                                <strong class="card-title my-0">G06-G07 Costura</strong>
                            </div>
                        </div> <!-- ./card-text -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-md-12 text-center mt-4">
                    <p class="h1 mb-4">Contactos o reportes</p>
                </div>

                <div class="col-md-4">
                    <div class="card shadow mb-12">
                        <div class="card-body text-center">
                            <a href="#!" class="avatar avatar-lg">
                                <img src="https://grammermx.com/Fotos/00030304.png" alt="..." class="avatar-img rounded-circle">
                            </a>
                            <div class="card-text my-2">
                                <strong class="card-title my-0">Paola Noguez</strong>
                                <p class="small text-muted mb-0">Comunicacion</p>
                                <p class="small"><span class="badge badge-dark">Comunicados y avisos</span></p>
                            </div>
                        </div> <!-- ./card-text -->
                        <div class="card-footer">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <small>
                                        <span class="dot dot-lg bg-success mr-1"></span> Enviamos un Whats App </small>
                                </div>
                                <div class="col-auto">
                                    <a href="https://wa.me/524421301886?text=Hola%20mundo" class="btn btn-sm btn-primary">Aqui</a>
                                </div>
                            </div>
                        </div> <!-- /.card-footer -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-md-4">
                    <div class="card shadow mb-12">
                        <div class="card-body text-center">
                            <a href="#!" class="avatar avatar-lg">
                                <img src="https://grammermx.com/Fotos/00030304.png" alt="..." class="avatar-img rounded-circle">
                            </a>
                            <div class="card-text my-2">
                                <strong class="card-title my-0">Miguel Solorio </strong>
                                <p class="small text-muted mb-0">Comunicacion</p>
                                <p class="small"><span class="badge badge-dark">Comunicados y avisos</span></p>
                            </div>
                        </div> <!-- ./card-text -->
                        <div class="card-footer">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <small>
                                        <span class="dot dot-lg bg-success mr-1"></span> Enviamos un Whats App </small>
                                </div>
                                <div class="col-auto">
                                    <a href="https://wa.me/524421301886?text=Hola%20mundo" class="btn btn-sm btn-primary">Aqui</a>
                                </div>
                            </div>
                        </div> <!-- /.card-footer -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-md-4">
                    <div class="card shadow mb-12">
                        <div class="card-body text-center">
                            <a href="#!" class="avatar avatar-lg">
                                <img src="https://grammermx.com/Fotos/00001606.png" alt="..." class="avatar-img rounded-circle">
                            </a>
                            <div class="card-text my-2">
                                <strong class="card-title my-0">Hadbet Ayari</strong>
                                <p class="small text-muted mb-0">IT</p>
                                <p class="small"><span class="badge badge-dark">Reportes sobre la plataforma</span></p>
                            </div>
                        </div> <!-- ./card-text -->
                        <div class="card-footer">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <small>
                                        <span class="dot dot-lg bg-success mr-1"></span> Enviamos un Whats App </small>
                                </div>
                                <div class="col-auto">
                                    <a href="https://wa.me/524421301886?text=Hola%20mundo" class="btn btn-sm btn-primary">Aqui</a>
                                </div>
                            </div>
                        </div> <!-- /.card-footer -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-md-12 text-center mt-4 mb-4 ">
                    <img src="./assets/images/fachada.png" alt="..." class="avatar-img rounded-circle" style="width: 50%">
                </div>

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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>



</script>

</body>
</html>