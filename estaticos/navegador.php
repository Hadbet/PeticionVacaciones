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
                        <a class="nav-link pl-3" href="principal.php"><span class="ml-1 item-text">Destacados</span>
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