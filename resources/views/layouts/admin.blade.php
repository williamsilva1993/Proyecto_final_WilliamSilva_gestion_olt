<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css"> 

    <style type="text/css">
        /* Tus estilos para la tabla aquí */
       .table-container {
         max-height: 410px;
         width: 100%;
       }
       
       .table-scroll {
         overflow-y: auto;
         height: 420px;
         scrollbar-width: none; /* Firefox */
       }
       
       .table-responsive {
         width: 100%;
       }
       
       th {
         background-color: #f2f2f2;
         position: sticky;
         top: 0;
         z-index: 1;
       }
       
       thead {
         position: sticky;
         top: 0;
         background-color: #fff;
         z-index: 1;
       }
       
       .text-color-iconos {
         color: #12bbad;
       }
       
       .opcion_activa {
         background-color: #12bbad;
         display: block;
         padding: 2px;
         border-radius: 5px;
       }
       
       /* DISEÑO PARA SPRINN EN CARGA */
       *,
       *:after,
       *before {
         margin: 0;
         padding: 0;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
       }
       
       #contenedor_carga {
         background-color: rgba(255, 255, 255, 0.9);
         height: 100%;
         width: 100%;
         position: fixed;
         transition: all 1s ease;
         z-index: 20000;
         display: none; /* Mantén el spinner oculto inicialmente */
       }
       
       #carga {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
       }
       
       #texto {
         text-align: center;
         margin-top: 130px;
         font-size: 25px;
       }
       
       /* Estilo para la barra de scroll */
       .table-scroll::-webkit-scrollbar {
         width: 8px; /* Ancho de la barra de scroll */
       }
       
       .table-scroll::-webkit-scrollbar-track {
         background-color: transparent; /* Color de fondo de la barra de scroll */
       }
       
       .table-scroll::-webkit-scrollbar-thumb {
         background-color: #12bbad; /* Color de la barra de scroll */
         border-radius: 4px; /* Radio de borde de la barra de scroll */
       }
       
       /* Ocultar la barra de scroll cuando no se está utilizando */
       .table-scroll {
         overflow-y: auto;
         height: 480px;
         scrollbar-width: none; /* Firefox */
       }
       
       /* Aparecer la barra de scroll al pasar el mouse sobre ella */
       .table-scroll:hover::-webkit-scrollbar {
         width: 8px;
       }
       
       .table-scroll:hover::-webkit-scrollbar-thumb {
         background-color: #12bbad;
       }
       
       /*  estilo para Activo o Onactivo */
       @keyframes pulsar {
       0% {
           background-color: #009929; /* Color verde */
           opacity: 1;
       }
       50% {
           background-color: #5ccb3f; /* Color amarillo */
           opacity: 0.7;
       }
       100% {
           background-color: #009929; /* Color verde */
           opacity: 1;
       }
       }
       
       @keyframes pulsar2 {
       0% {
           background-color: #e00000; /* Color verde */
           opacity: 1;
       }
       50% {
           background-color: #ff0000; /* Color amarillo */
           opacity: 0.7;
       }
       100% {
           background-color: #e00000; /* Color verde */
           opacity: 1;
       }
       }
       
       .badge-success.palpitando {
       animation: pulsar 3s infinite; /* La animación dura 2 segundos y se repite infinitamente */
       }
       .badge-success.palpitandored {
       animation: pulsar2 3s infinite; /* La animación dura 2 segundos y se repite infinitamente */
       }
       
       /* CODIGO PARA QUE MI CARD OCUPE TODO EL ALTO DE MI PANTALLA NUEVA*/
               .full-height {
           height: 75vh; /* Ocupa el 100% de la altura de la ventana */
           overflow: auto; /* Permite el desplazamiento si el contenido es más largo */
       }
       
             </style>


</head>

<body id="page-top">
    <div id="contenedor_carga" style="display: none;">
        <img id="carga" src="{{ asset('img/cargando.gif') }}" alt="Cargando...">
        <div id="texto" class="text-xs font-weight-bold text-primary text-uppercase mb-1" >Obteniendo información...</div>
    </div>
    <script>
        function mostrarSpinner() {
            document.getElementById('contenedor_carga').style.display = 'block';
        }
    
        function ocultarSpinner() {
            document.getElementById('contenedor_carga').style.display = 'none';
        }
    
        window.addEventListener('load', function () {
            ocultarSpinner(); // Ocultar el spinner cuando la página se carga inicialmente
        });
    
        window.addEventListener('pageshow', function (event) {
            if (event.persisted) {
                // Ocultar el spinner cuando la página se muestra después de la navegación hacia atrás
                ocultarSpinner();
            }
        });
    </script>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL('/principal') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

       

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
 <!-- Nav Item - Dashboard -->
 <li class="nav-item active">
    <a class="nav-link" href="{{ URL('/principal') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Escritorio</span></a>
</li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('olt.create') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Gestión de OLTS</span>
                </a>

            </li>
   
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Seguridad
            </div>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link " href="{{ route('seguridad.create') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Usuarios</span>
            </a>

        </li>
        
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar  static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                @yield('contenido')
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

      <!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
        <script src="{{asset('js/table.js')}}"></script>
        <script>
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 3500); 
    </script>

</body>

</html>
