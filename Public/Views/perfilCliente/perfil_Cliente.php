<?php

session_start();
$correoUsuario = $_SESSION['correo'];
if(!isset($correoUsuario)){
    echo'<script type="text/javascript">
    alert("La pagina a la cual intenta acceder requiere haber iniciado sesion previamente");
    window.location.href="../../Login.php";
    </script>';
}else{

}
?>
<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DCompras</title>

    <link href="assets/css/perfilCliente.css" rel="stylesheet">

    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="apple-touch-icon" href="assets/img/Recurso 1LogoD.png">
    <link rel="shortcut icon" href="assets/img/Recurso 1LogoD.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="./perfil_Cliente.php"><i class="fas fa-user"></i> Cliente</a>
                    </li>
                    <li class="menu-title">Menú</li>
                    <li>
                        <a href="../carritoCompras/tienda.php"> <img src="assets/images/cancel.png" alt="Correo:" width="30" height="28">Comprar</a>
                    </li>
                    <li>
                        <a href="./cliente/index.php?c=pedido&a=cliente"> <img src="assets/images/logoPedidos.png" alt="Correo:" width="30" height="28"> Crear Pedidos</a>
                    </li>
                    <li>
                        <a href="ActualizarPedidos.html"> <img src="assets/images/actualizarPedido.png" alt="Correo:" width="30" height="28"> Actualizar Pedidos</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><img src="assets/images/cancelPedido.png" alt="Correo:" width="30" height="28"> Cancelar Pedidos</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <img src="assets/images/logoDomicilio.png" alt="Correo:" width="30" height="28"> Crear Domicilio</a>
                    </li>
                    <li>
                        <a href="ActualizarPedidos.html" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <img src="assets/images/actualizarD.png" alt="Correo:" width="30" height="28"> Actualizar Domicilio</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <img src="assets/images/cancel.png" alt="Correo:" width="30" height="28"> Cancelar Domicilio</a>
                    </li>
            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./perfil_Cliente.php"><img src="assets/img/Recurso 3LogoCompleto.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="assets/img/Logo_Nuevo.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Que quieres Buscar?" aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">Tienes 3 Notificaciones</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Pedido Aceptado</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Pedido en Procceso.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Pedido Denegado.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">Tienes 4 Mensajes</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="img/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Ochoa</span>
                                        <span class="time float-right">Justo ahora</span>
                                        <p>Hola, su pedido ya esta en camino</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="img/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Carlos Martinez</span>
                                        <span class="time float-right">hace 5 minutos</span>
                                        <p>Buenas Tardes, su pedido tarda 5 minutos más</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="img/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Manuel Lopez</span>
                                        <span class="time float-right">hace 10 minutos</span>
                                        <p>Hola, le regalas 5 puntos para que los redimas en lo que quieras</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="img/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Hector Flores</span>
                                        <span class="time float-right">hace 15 minutos </span>
                                        <p>Buenas tardes, su pedido ya llego</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="assets/images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Mi Perfil! <?php echo  ' ' .strtoupper($_SESSION[ 'correo']); ?></a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notificaciones <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Configuraciones</a>

                            <a class="nav-link" href="../../../App/controller/logoutController.php"><i class="fa fa-power -off"></i>Cerrar Sesión</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count">23569</span></div>
                                            <div class="stat-heading">Su dinero</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">349</span></div>
                                            <div class="stat-heading">Compras</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">2986</span></div>
                                            <div class="stat-heading">Amigos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
         <span class="cards__title">Restaurantes</span>

    <ul class="cards_list">
      <li class="card">
        <a href="#" class="card card__link">
          <img src="assets/img/mcdonalds.png" alt="food_picture">
          <span class="card__restaurant">McDonald's</span>
          <span class="card__category">$$ • Envio gratis</span>
          <span class="card__time">25 - 35 Min</span>
        </a>
      </li>

      <li class="card">
        <a href="#" class="card card__link">
          <img src="assets/img/wokwei.png" alt="food_picture">
          <span class="card__restaurant">WOKWEI</span>
          <span class="card__category">$3700 • Envio</span>
          <span class="card__time">40 - 50 Min</span>
        </a>
      </li>

      <li class="card">
        <a href="" class="card card__link">
          <img src="assets/img/yizha.png" alt="food_picture">
          <span class="card__restaurant">Comida rapida YIZHA </span>
          <span class="card__category">$2500 • Envio</span>
          <span class="card__time">35 - 45 Min</span>
        </a>
      </li>

      <li class="card">
        <a href="" class=" card card__link">
          <img src="assets/img/musafir.png" alt="food_picture">
          <span class="card__restaurant">Ensaladas Musafir</span>
          <span class="card__category">$2300 • Envio</span>
          <span class="card__time">30 - 40 Min</span>
        </a>
      </li>

      <li class="card">
        <a href="" class=" card card__link">
          <img src="assets/img/kfc.png" alt="food_picture">
          <span class="card__restaurant">KFC</span>
          <span class="card__category">$$ • Envio gratis</span>
          <span class="card__time">15 - 30 Min</span>
        </a>
      </li>

      <li class="card">
        <a href="" class=" card card__link">
          <img src="assets/img/milk_bar.png" alt="food_picture">
          <span class="card__restaurant">Postres el Restrepo</span>
          <span class="card__category">$$ • Envio gratis</span>
          <span class="card__time">25 - 35 Min</span>
        </a>
      </li>

      <li class="card">
        <a href="" class=" card card__link">
          <img src="assets/img/mimosa_pizza.png" alt="food_picture">
          <span class="card__restaurant">Mimosa's Pizza</span>
          <span class="card__category">$$ • Envio gratis</span>
          <span class="card__time">15 - 25 Min</span>
        </a>
      </li>

      <li class="card">
        <a href="" class=" card card__link">
          <img src="assets/img/to_be.png" alt="food_picture">
          <span class="card__restaurant">Sushi's 20 de Julio</span>
          <span class="card__category">$$ • Envio gratis</span>
          <span class="card__time">25 - 35 Min</span>
        </a>
      </li>

      <li class="card">
        <a href="" class=" card card__link">
          <img src="assets/img/druzi_cafe.png" alt="food_picture">
          <span class="card__restaurant">Gourmet Cdad Jardin</span>
          <span class="card__category">$4200 • Envio</span>
          <span class="card__time">30 - 40 Min</span>
        </a>
      </li>
    </ul>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2021 IMAKE
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
</body>
</html>