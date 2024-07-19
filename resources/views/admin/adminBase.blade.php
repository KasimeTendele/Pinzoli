<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css"> -->

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- Vendor CSS Files -->
    <!-- <link href="{{asset('adminAssets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <link href="{{asset('adminAssets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="{{asset('adminAssets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('adminAssets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/vendor/quill/quill.bubble.css')}}" rel="stylesheet"> -->
    <link href="{{asset('adminAssets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('adminAssets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/review.css')}}">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{asset('assets/img/logoo.jpg')}}" alt="">
                <span class="d-none d-lg-block">Matanga</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ (!empty($user->avatar)) ? url('upload/users_images/'.$user->avatar) :url('upload/login.png') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Str::words( $user->prenom,1) }}.{{$user->nom}}</span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Str::words( $user->prenom,1) }} {{$user->nom}}</h6>
                            <span>{{$user->role}}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('admin.profile')}}">
                                <i class="bi bi-person"></i>
                                <span>Mon Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                          
                            @auth
                        <form class="nav-item" action="{{route('userLogout')}}" method="post">
                        @method("delete")
                            @csrf
                            <div class="logout dropdown-item d-flex align-items-center">
                            <i class="bi bi-box-arrow-right"></i>
                            <button class="nav-link">Me Déconnecter</button>

                            </div>
                        </form>
                        @endauth
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.dashoard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Option générales</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('index')}}">
                            <i class="bi bi-circle"></i><span>accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('defunts')}}">
                            <i class="bi bi-circle"></i><span>voir défunts</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('createFamille')}}">
                            <i class="bi bi-circle"></i><span>créer famille</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('createUser')}}">
                            <i class="bi bi-circle"></i><span>créer utilisateur</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('espace')}}">
                            <i class="bi bi-circle"></i><span>Mon espace </span>
                        </a>
                    </li>
                    


                </ul>
            </li>

            <li class="nav-heading">Mes actions propres</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('gestUser')}}">
                    <i class="bi bi-person"></i>
                    <span>gestion utilisateurs</span>
                </a>
            </li>
            <!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('gestDefunt')}}">
                    <i class="bi bi-person"></i>
                    <span>gestion défunts</span>
                </a>
            </li>
            <!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('gestCim',['cimetiere'=>1])}}">
                    <i class="bi bi-envelope"></i>
                    <span>gestion cimétières</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('notification')}}">
                    <i class="bi bi-envelope"></i>
                    <span>Notifications</span>
                </a>
            </li>
            <!-- End Contact Page Nav -->


        </ul>

    </aside>
    <!-- End Sidebar-->

    @yield('content')

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>MwanaCampa</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
           
            Designed by <a href="">Ruben and Kasime</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <!-- Vendor JS Files -->
    <!-- <script src="{{asset('adminAssets/vendor/apexcharts/apexcharts.min.js')}}"></script> -->
    <!-- <script src="{{asset('adminAssets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz " crossorigin="anonymous "></script>

    <!-- <script src="{{asset('adminAssets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/quill/quill.min.js')}}"></script> -->
    <script src="{{asset('adminAssets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/tinymce/tinymce.min.js')}}"></script>
    <!-- <script src="{{asset('adminAssets/vendor/php-email-form/validate.js')}}"></script> -->
    <script>
        $(document).ready(function() {
            new DataTable("#todo_table");


            $('#destroNotif').submit(function(e){
             if(confirm("vraimment supprimé?")==true){
                e.preventDefault()
            
            const formData=new FormData(this);
            // const formData=$(this).serializeArray();
            $.ajax({
                type:'post',
                url:"{{route('destroyNotification')}}",
                data:formData,
                Cache:false,
                contentType:false,
                dataType:'Json',
                processData:false,
                beforeSend: function(){
                    $("#btnSup").text('chargement...');
                },
                
                success:(response)=>{
                    if(response.status==="success"){
                        $("#alert").html(
                        `<div class='alert alert-success alert-dismissible'>
                          ${response.message}
                       <button type='button' class='btn btn-close' data-dismiss='alert'><button/><div/>` 
                    )
                    }else if(response.status==="failed"){
                        $("#alert").html(
                      ` <div class='alert alert-danger alert-dismissible'>
                          ${response.message}
                       <button type='button' class='btn btn-close' data-dismiss='alert'><button/><div/>`   
                    )
                    }
                 
                },
                error:function(response){
                    
                    $("#alert").html(
                      `<div class='alert alert-danger alert-dismissible'>
                          ${response.message}
                       <button type='button' class='btn btn-close' data-dismiss='alert'><button/><div/>`   
                    )
                   
                }
                })
             }
           
        })
        })
    </script>
    <!-- Template Main JS File -->
    <script src="{{asset('adminAssets/js/main.js')}}"></script>
    

</body>

</html>