<?php
session_start();

if ($_SESSION["nomina"] == "" && $_SESSION["nomina"] == null) {
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=index.html'>";
    session_destroy();
} else {
    session_start();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/Grammer_Logo.ico">
    <title>Peticion Vacaciones</title>
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
    <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-muted my-2" data-mode="light">
                    <i class=" "><?php echo $_SESSION["nombre"]?></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="https://grammermx.com/Fotos/<?php echo $_SESSION["nomina"]?>.png" alt="..." class="avatar-img rounded-circle">
              </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <a class="dropdown-item" href="#" style="color: red">Cerrar Session</a>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                    <img style="width: 90%" class="navbar-brand-img brand-sm" src="assets/images/grammer.svg">
                </a>
            </div>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                    <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text">Inicio</span><span class="sr-only">(current)</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">General</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Menu principal</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                    <a href="#ui-elements" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle nav-link">
                        <i class="fe fe-message-circle fe-16"></i>
                        <span class="ml-3 item-text">Comunicados</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="index.html"><span class="ml-1 item-text">Destacados</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="form_idea.html"><span class="ml-1 item-text">Gramito te escucha</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item w-100">
                    <a class="nav-link" href="widgets.html">
                        <i class="fe fe-sun fe-16"></i>
                        <span class="ml-3 item-text">Vacaciones</span>
                        <span class="badge badge-pill badge-primary">New</span>
                    </a>
                </li>

                <li class="nav-item w-100">
                    <a class="nav-link" href="widgets.html">
                        <i class="fe fe-thumbs-down fe-16"></i>
                        <span class="ml-3 item-text">Ausentismos</span>
                        <span class="badge badge-pill badge-primary">New</span>
                    </a>
                </li>

                <li class="nav-item w-100">
                    <a class="nav-link" href="widgets.html">
                        <i class="fe fe-smile fe-16"></i>
                        <span class="ml-3 item-text">Perfil</span>
                    </a>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Administradores</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                    <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-book fe-16"></i>
                        <span class="ml-3 item-text">Reportes</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                        <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Dash Board</span></a>
                        <a class="nav-link pl-3" href="./contacts-grid.html"><span class="ml-1">Tablas Admin</span></a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-tool fe-16"></i>
                        <span class="ml-3 item-text">Sistema</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                        <a class="nav-link pl-3" href="./profile.html"><span class="ml-1">Dias Bloqueados</span></a>
                        <a class="nav-link pl-3" href="./profile-settings.html"><span
                                    class="ml-1">Creacion de usuarios</span></a>
                        <a class="nav-link pl-3" href="./profile-security.html"><span
                                    class="ml-1">Modificar Grupos</span></a>
                    </ul>
                </li>
            </ul>
            <div class="btn-box w-100 mt-4 mb-1">
                <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269"
                   target="_blank" class="btn mb-2 btn-danger btn-lg btn-block">
                    <i class="fe fe-x-circle fe-12 mx-2"></i><span class="small">Cerrar Sesion</span>
                </a>
            </div>
        </nav>
    </aside>
    <main role="main" class="main-content">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <h2 class="page-title">Petición de vacaciones tienes <span class="badge badge-dark">28</span> dias
                        disponibles</h2>
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Llene el formulario de manera correcta</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="cbSupervisor">Nomina</label>
                                        <input type="text" id="txtNomina" value="<?php echo $_SESSION["nomina"]?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="cbSupervisor">Nombre</label>
                                        <input type="text" id="txtNombre" value="<?php echo $_SESSION["nombre"]?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="cbApu">APU</label>
                                        <select class="form-select mb-2 mr-sm-2 form-control" id="cbApu" required
                                                onchange="llenarSuper()">
                                            <option value="">Seleccionar APU</option>
                                            <option value="APU 1">APU 1</option>
                                            <option value="APU 2">APU 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="cbSupervisor">Supervisor</label>
                                        <select class="form-select mb-2 mr-sm-2 form-control" id="cbSupervisor" required
                                                onchange="llenarShift()">
                                            <option value="">Seleccionar Supervisor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="cbShiftLeader">Shift Leader</label>
                                        <select class="form-select mb-2 mr-sm-2 form-control" id="cbShiftLeader"
                                                required>
                                            <option value="">Seleccionar Shift Leader</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <br><br>
                                    <button type="button" id="submit-btn"
                                            class="btn btn-success mb-2 float-right text-white">Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="calendar-container" id="calendar-container">
            <div class="calendar-header">
                <h1 class="calendar-title">GRAMMOVIL</h1>
                <div class="calendar-nav">
                    <button id="prev-month">&lt;</button>
                    <span id="current-month">Mes y Año</span>
                    <button id="next-month">&gt;</button>
                </div>
            </div>

            <div class="calendar-grid" id="calendar-grid">
                <!-- Días de la semana -->
                <div class="day-header">Lunes</div>
                <div class="day-header">Martes</div>
                <div class="day-header">Miércoles</div>
                <div class="day-header">Jueves</div>
                <div class="day-header">Viernes</div>
                <div class="day-header">Sábado</div>
                <div class="day-header">Domingo</div>

                <!-- Celdas de días se generarán con JavaScript -->
            </div>
        </div>

        <!-- Modal para agregar/editar eventos -->
        <div class="modal" id="event-modal">
            <div class="modal-content">
                <h2 id="modal-title">Solicitud de Vacaciones</h2>
                <form id="event-form">
                    <input type="hidden" id="event-id">
                    <div class="form-group">
                        <label for="event-title">Nombre</label>
                        <input type="text" id="event-title" required placeholder="Ej: Vacaciones familiares">
                    </div>
                    <div class="form-group">
                        <label for="event-date">Fecha</label>
                        <input type="date" id="event-date" required>
                    </div>
                    <div class="form-group">
                        <label for="event-apu">APU</label>
                        <input type="text" id="event-apu" class="locked-field" readonly>
                    </div>
                    <div class="form-group">
                        <label for="event-supervisor">Supervisor</label>
                        <input type="text" id="event-supervisor" class="locked-field" readonly>
                    </div>
                    <div class="form-group">
                        <label for="event-shiftleader">Shift Leader</label>
                        <input type="text" id="event-shiftleader" class="locked-field" readonly>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" id="cancel-btn">Cancelar</button>
                        <button type="submit" class="btn-primary">Solicitar Vacaciones</button>
                    </div>
                </form>
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
    function llenarSuper() {
        $.getJSON('https://grammermx.com/RH/Vacaciones/dao/daoSupervisor.php?APU=' + document.getElementById("cbApu").value, function (data) {
            var selectS = document.getElementById("cbSupervisor");
            selectS.innerHTML = "";

            var selectA = document.getElementById("cbShiftLeader");
            selectA.innerHTML = "";


            var createOptionDef = document.createElement("option");
            createOptionDef.text = "Seleccione";
            createOptionDef.value = "";
            selectS.appendChild(createOptionDef);

            for (var i = 0; i < data.data.length; i++) {
                var createOptionS = document.createElement("option");
                createOptionS.text = data.data[i].Supervisor;
                createOptionS.value = data.data[i].Supervisor;
                selectS.appendChild(createOptionS);
            }
        });
    }

    function llenarShift() {
        $.getJSON('https://grammermx.com/RH/Vacaciones/dao/daoShiftLeader.php?APU=' + document.getElementById("cbApu").value, function (data) {
            var selectS = document.getElementById("cbShiftLeader");
            selectS.innerHTML = "";

            var createOptionDefS = document.createElement("option");
            createOptionDefS.text = "Seleccione";
            createOptionDefS.value = "";
            selectS.appendChild(createOptionDefS);

            for (var i = 0; i < data.data.length; i++) {
                var createOptionS = document.createElement("option");
                createOptionS.text = data.data[i].ShiftLeader;
                createOptionS.value = data.data[i].ShiftLeader;
                selectS.appendChild(createOptionS);
            }
        });
    }


    function llenarConfiguracionPorShiftLeader() {
        $.getJSON('https://grammermx.com/RH/Vacaciones/dao/daoConfiguraciones.php', function (data) {
            for (var i = 0; i < data.data.length; i++) {
                data.data[i].Descripcion;
                data.data[i].Tipo;
                data.data[i].ShiftLeader;
            }
        });
    }
</script>

<script>
    // Variables globales
    let events = [];
    let blockedDays = [];
    let selectedApu = '';
    let selectedSupervisor = '';
    let selectedShiftLeader = '';
    let currentDate = new Date();
    let selectedEvent = null;
    let eventosPorDia = 1; // Valor por defecto
    let currentUserNomina = '';

    // Fechas permitidas (desde hoy hasta 2 meses después)
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const maxDate = new Date();
    maxDate.setMonth(today.getMonth() + 2);
    maxDate.setHours(0, 0, 0, 0);

    // Elementos del DOM
    const calendarContainer = document.getElementById('calendar-container');
    const calendarGrid = document.getElementById('calendar-grid');
    const currentMonthElement = document.getElementById('current-month');
    const prevMonthBtn = document.getElementById('prev-month');
    const nextMonthBtn = document.getElementById('next-month');
    const eventModal = document.getElementById('event-modal');
    const eventForm = document.getElementById('event-form');
    const modalTitle = document.getElementById('modal-title');
    const eventIdInput = document.getElementById('event-id');
    const eventTitleInput = document.getElementById('event-title');
    const eventDateInput = document.getElementById('event-date');
    const eventApuInput = document.getElementById('event-apu');
    const eventSupervisorInput = document.getElementById('event-supervisor');
    const eventShiftLeaderInput = document.getElementById('event-shiftleader');
    const cancelBtn = document.getElementById('cancel-btn');
    const submitBtn = document.getElementById('submit-btn');
    const cbApu = document.getElementById('cbApu');
    const cbSupervisor = document.getElementById('cbSupervisor');
    const cbShiftLeader = document.getElementById('cbShiftLeader');

    // Función para cargar la configuración del Shift Leader
    function loadShiftLeaderConfig(shiftLeaderName) {
        return new Promise((resolve, reject) => {
            $.getJSON('https://grammermx.com/RH/Vacaciones/dao/daoConfiguraciones.php', function (data) {
                if (data && data.data) {
                    const config = data.data.find(item =>
                        item.Tipo === "Dias Habilitados" &&
                        item.ShiftLeader === shiftLeaderName
                    );

                    if (config) {
                        eventosPorDia = parseInt(config.Descripcion) || 1;
                        console.log(`Configuración cargada: ${eventosPorDia} eventos/día para ${shiftLeaderName}`);
                    } else {
                        eventosPorDia = 1;
                        console.warn(`No se encontró configuración para ${shiftLeaderName}, usando valor por defecto (1)`);
                    }
                    resolve();
                } else {
                    reject(new Error('Datos de configuración no válidos'));
                }
            }).fail(reject);
        });
    }

    // Función para formatear fechas a YYYY-MM-DD
    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toISOString().split('T')[0];
    }

    // Función para cargar eventos desde la API
    function loadEventsFromAPI() {
        return new Promise((resolve, reject) => {
            $.getJSON('https://grammermx.com/RH/Vacaciones/dao/daoSolicitudesShiftLeader.php?shiftLeader=' + encodeURIComponent(selectedShiftLeader), function(data) {
                if (data && data.data) {
                    events = data.data.map(item => ({
                        id: item.IdSolicitud,
                        title: "Petición de vacaciones",
                        date: formatDate(item.FechaSolicitud),
                        apu: item.APU,
                        supervisor: item.Supervisor,
                        shiftleader: item.ShiftLeader,
                        nomina: item.NominaSolicitud // Nuevo campo agregado
                    }));
                    resolve();
                } else {
                    reject(new Error('Datos de eventos no válidos'));
                }
            }).fail(reject);
        });
    }

    // Función para cargar días bloqueados desde la API
    function loadBlockedDaysFromAPI() {
        return new Promise((resolve, reject) => {
            $.getJSON('https://grammermx.com/RH/Vacaciones/dao/daoDiasBloqueados.php', function (data) {
                if (data && data.data) {
                    blockedDays = data.data.map(item => formatDate(item.Fecha));
                    resolve();
                } else {
                    reject(new Error('Datos de días bloqueados no válidos'));
                }
            }).fail(reject);
        });
    }

    // Función para inicializar el calendario
    async function initializeCalendar() {
        try {
            showLoader();
            await Promise.all([
                loadEventsFromAPI(),
                loadBlockedDaysFromAPI()
            ]);
            initCalendar();
        } catch (error) {
            console.error('Error al cargar datos:', error);
            events = [{
                id: 1,
                title: "1 lugar ocupado",
                date: new Date().toISOString().split('T')[0],
                apu: "APU 1",
                supervisor: "Supervisor por defecto",
                shiftleader: "Shift Leader por defecto"
            }];
            blockedDays = [new Date().toISOString().split('T')[0]];
            initCalendar();
        } finally {
            hideLoader();
        }
    }

    // Evento para enviar el formulario inicial
    submitBtn.addEventListener('click', async () => {
        if (!validarFormularioInicial()) return;

        selectedApu = cbApu.value;
        selectedSupervisor = cbSupervisor.value;
        selectedShiftLeader = cbShiftLeader.value;

        try {
            showLoader();
            await loadShiftLeaderConfig(selectedShiftLeader);
            await initializeCalendar();

            calendarContainer.style.display = 'block';
            calendarContainer.scrollIntoView({behavior: 'smooth'});

            // Mostrar información al usuario
            const infoElement = document.createElement('div');
            infoElement.className = 'alert alert-info mt-3';
            infoElement.innerHTML = `
        <strong>Configuración actual:</strong>
        Máximo ${eventosPorDia} solicitud(es) de vacaciones por día permitidas
      `;
            calendarContainer.parentNode.insertBefore(infoElement, calendarContainer.nextSibling);

        } catch (error) {
            console.error('Error:', error);
            Swal.fire('Error', 'Error al cargar la configuración', 'error');
        } finally {
            hideLoader();
        }
    });

    function validarFormularioInicial() {
        if (!cbApu.value || !cbSupervisor.value || !cbShiftLeader.value) {
            Swal.fire('Error', 'Por favor complete todos los campos del formulario', 'warning');
            return false;
        }
        return true;
    }

    // Inicializar calendario
    function initCalendar() {
        renderCalendar();
        setupEventListeners();
    }

    // Renderizar el calendario
    function renderCalendar() {
        while (calendarGrid.children.length > 7) {
            calendarGrid.removeChild(calendarGrid.lastChild);
        }

        currentMonthElement.textContent = `${getMonthName(currentDate.getMonth())} ${currentDate.getFullYear()}`;

        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

        let firstDayOfWeek = firstDay.getDay();
        firstDayOfWeek = firstDayOfWeek === 0 ? 6 : firstDayOfWeek - 1;

        const daysInLastMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();

        for (let i = firstDayOfWeek - 1; i >= 0; i--) {
            const day = daysInLastMonth - i;
            const dayCell = createDayCell(day, true);
            calendarGrid.appendChild(dayCell);
        }

        for (let day = 1; day <= lastDay.getDate(); day++) {
            const dateStr = `${currentDate.getFullYear()}-${(currentDate.getMonth() + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
            const dayCell = createDayCell(day, false);
            const cellDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);

            if (currentDate.getMonth() === today.getMonth() &&
                currentDate.getFullYear() === today.getFullYear() &&
                day === today.getDate()) {
                dayCell.classList.add('today');
            }

            if (blockedDays.includes(dateStr)) {
                dayCell.classList.add('blocked-day');
            }

            if (cellDate >= today && cellDate <= maxDate) {
                dayCell.classList.add('future-day');
            }

            const dayEvents = events.filter(event => event.date === dateStr);

            // Mostrar contador de eventos (X/Y)
            const counterElement = document.createElement('div');
            counterElement.className = 'event-counter';
            counterElement.textContent = `${dayEvents.length}/${eventosPorDia}`;
            counterElement.style.fontSize = '0.8rem';
            counterElement.style.textAlign = 'right';
            counterElement.style.marginBottom = '5px';
            counterElement.style.color = dayEvents.length >= eventosPorDia ? 'red' : 'green';
            dayCell.insertBefore(counterElement, dayCell.firstChild);

            dayEvents.forEach(event => {
                const eventElement = document.createElement('div');
                eventElement.className = 'event';
                eventElement.textContent = `${event.title}`;
                eventElement.dataset.eventId = event.id;
                // Eliminado el event listener para edición
                dayCell.appendChild(eventElement);
            });

            calendarGrid.appendChild(dayCell);
        }

        const totalCells = 7 * 6;
        const daysAdded = firstDayOfWeek + lastDay.getDate();
        const daysRemaining = totalCells - daysAdded;

        for (let day = 1; day <= daysRemaining; day++) {
            const dayCell = createDayCell(day, true);
            calendarGrid.appendChild(dayCell);
        }
    }

    // Crear celda de día
    function createDayCell(day, isOtherMonth) {
        const dayCell = document.createElement('div');
        dayCell.className = `day-cell ${isOtherMonth ? 'other-month' : ''}`;

        const dayNumber = document.createElement('div');
        dayNumber.className = 'day-number';
        dayNumber.textContent = day;
        dayCell.appendChild(dayNumber);

        if (!isOtherMonth) {
            const dateStr = `${currentDate.getFullYear()}-${(currentDate.getMonth() + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
            const cellDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);

            if (cellDate >= today && cellDate <= maxDate && !blockedDays.includes(dateStr)) {
                dayCell.addEventListener('click', (e) => {
                    if (e.target === dayCell || e.target === dayNumber) {
                        const dayEvents = events.filter(event => event.date === dateStr);
                        if (dayEvents.length >= eventosPorDia) {
                            Swal.fire('Límite alcanzado', `Solo se permiten ${eventosPorDia} solicitudes por día`, 'warning');
                        } else {
                            addEvent(dateStr);
                        }
                    }
                });
            }
        }

        return dayCell;
    }

    // Configurar event listeners
    function setupEventListeners() {
        prevMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        nextMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        eventForm.addEventListener('submit', (e) => {
            e.preventDefault();
            saveEvent();
        });

        cancelBtn.addEventListener('click', () => {
            eventModal.style.display = 'none';
        });

        eventModal.addEventListener('click', (e) => {
            if (e.target === eventModal) {
                eventModal.style.display = 'none';
            }
        });
    }

    // Abrir modal para agregar evento
    function addEvent(date) {
        selectedEvent = null;
        modalTitle.textContent = 'Solicitar Vacaciones';
        eventIdInput.value = '';
        eventTitleInput.value = 'Petición de vacaciones';
        eventDateInput.value = date;
        eventApuInput.value = selectedApu;
        eventSupervisorInput.value = selectedSupervisor;
        eventShiftLeaderInput.value = selectedShiftLeader;
        eventModal.style.display = 'flex';
    }

    // Guardar evento (solo creación)
    async function saveEvent() {
        const eventDate = new Date(eventDateInput.value);
        eventDate.setHours(0, 0, 0, 0);

        // Obtener valores de los campos
        const nomina = document.getElementById('txtNomina').value;
        const nombre = document.getElementById('txtNombre').value;

        // Validar si ya existe una solicitud para esta nómina en la misma fecha
        const yaTieneSolicitud = events.some(event =>
            event.nomina === nomina &&
            event.date === eventDateInput.value
        );

        if (yaTieneSolicitud) {
            Swal.fire('Solicitud existente', 'Ya tienes una solicitud de vacaciones para esta fecha. Por favor elige otra fecha.', 'warning');
            return;
        }

        // Validaciones de fecha
        if (eventDate < today || eventDate > maxDate) {
            Swal.fire('Error', 'Solo puedes solicitar vacaciones desde hoy hasta ' + maxDate.toLocaleDateString(), 'warning');
            return;
        }

        if (blockedDays.includes(eventDateInput.value)) {
            Swal.fire('Error', 'No puedes solicitar vacaciones en días bloqueados', 'warning');
            return;
        }

        // Validar límite de eventos por día (frontend como capa UX)
        const eventosEnEsteDia = events.filter(e => e.date === eventDateInput.value).length;
        if (eventosEnEsteDia >= eventosPorDia) {
            Swal.fire('Límite alcanzado', `No puedes agregar más de ${eventosPorDia} solicitudes de vacaciones por día`, 'warning');
            return;
        }

        if (!nomina || !nombre) {
            Swal.fire('Error', 'Por favor complete los campos de nómina y nombre', 'warning');
            return;
        }

        const eventData = {
            id: Date.now(),
            title: "Petición de vacaciones",
            date: eventDateInput.value,
            apu: selectedApu,
            supervisor: selectedSupervisor,
            shiftleader: selectedShiftLeader,
            nomina: nomina,
            nombre: nombre
        };

        try {
            showLoader();

            const response = await $.ajax({
                url: 'https://grammermx.com/RH/Vacaciones/dao/daoGuardarSolicitud.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    nomina: eventData.nomina,
                    nombre: eventData.nombre,
                    APU: eventData.apu,
                    Supervisor: eventData.supervisor,
                    ShiftLeader: eventData.shiftleader,
                    Fecha: eventData.date,
                    validarConcurrencia: true
                }
            });

            if (response.success) {
                events.push({
                    ...eventData,
                    id: response.id || Date.now()
                });

                localStorage.setItem('vacationRequests', JSON.stringify(events));
                eventModal.style.display = 'none';
                renderCalendar();

                Swal.fire({
                    title: "¡Éxito!",
                    text: "Solicitud de vacaciones enviada correctamente",
                    icon: "success",
                    confirmButtonText: "OK Gracias!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.open("https://grammermx.com/RH/Vacaciones/inicio.php");
                    }
                });
            } else {
                if (response.error === 'concurrencia') {
                    // Actualizar calendario y mostrar mensaje
                    await initializeCalendar();
                    Swal.fire({
                        title: 'Cambios detectados',
                        html: `El límite de solicitudes para esta fecha fue alcanzado.<br>
                          <small>El calendario se ha actualizado con los últimos cambios.</small>`,
                        icon: 'info',
                        confirmButtonText: 'Entendido'
                    });
                } else {
                    Swal.fire('Error', response.message || 'Error al guardar la solicitud', 'error');
                }
            }
        } catch (error) {
            console.error('Error al guardar:', error);
            Swal.fire('Error', 'Error al conectar con el servidor', 'error');
        } finally {
            hideLoader();
        }
    }

    // Helper para obtener nombre del mes
    function getMonthName(monthIndex) {
        const months = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];
        return months[monthIndex];
    }

    // Funciones para loader
    function showLoader() {
        const loader = document.getElementById('loader');
        if (loader) loader.style.display = 'block';
    }

    function hideLoader() {
        const loader = document.getElementById('loader');
        if (loader) loader.style.display = 'none';
    }

    // Inicialización
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>


</body>
</html>