<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url('/desarrollador/home')}}">CC V</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item disabled" href="#">{{$usuario->nombre}}</a>
                <a class="dropdown-item disabled" href="#">{{$usuario->email}}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/desarrollador/logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/desarrollador/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">


                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Épicas
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('desarrollador/verepica')}}">Ver epicas</a>
                        </nav>
                    </div>
{{--                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">--}}
{{--                        <nav class="sb-sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link" href="{{url('desarrollador/home')}}">Todos los clientes</a>--}}
{{--                            <a class="nav-link" href="{{url('desarrollador/crearcliente/'.$usuario->id)}}">Crear cliente</a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}




                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Historia de Usuarios
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('desarrollador/verhistoria')}}">Ver Historias</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Backlog
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('desarrollador/verbacklog')}}">Ver Backlog</a>
                        </nav>
                    </div>
{{--                    <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">--}}
{{--                        <nav class="sb-sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link" href="{{url('desarrollador/verstakeholders')}}">Ver stakeholders</a>--}}
{{--                            <a class="nav-link" href="{{url('desarrollador/crearstakeholder')}}">Crear stakeholder</a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}


                </div>
            </div>

        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
{{--                <h1 class="mt-4">Clientes</h1>--}}

{{--                <ol class="breadcrumb mb-4">--}}
{{--                    <li class="breadcrumb-item active"> </li>--}}
{{--                </ol>--}}
                    @yield('contenido')
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="/js/datatables-demo.js"></script>


</body>
</html>
