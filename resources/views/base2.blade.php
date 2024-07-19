<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Vesperr Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <title>@yield('title')| agence</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">

    <!-- Google Fonts -->
    <link href=" https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

     <!-- Vendor CSS Files -->
    <!-- <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/css/glightbox.min.css">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css">
    <!-- <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/test2.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/signUp.css')}}">

</head>

<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/logoo.jpg')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">Matanga
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Matanga</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index')}}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('defunts')}}">Voir défunts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('createFamille')}}">Créer famille</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('createUser')}}">Créer compte</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('login')}}">se connecter</a>
                        </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="#">A propos</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('espace')}}">Mon espace</a>
                        </li>
                        <form class="nav-item" action="{{route('userLogout')}}" method="post">
                        @method("delete")
                            @csrf
                            <div class="logout">
                            <button class="nav-link">se déconnecter</button>

                            </div>
                        </form>
                        @endauth
                       

                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

        <!-- ======= Footer ======= -->
        <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                <div class="copyright">
                        &copy; Copyright <strong>MwanaCampa</strong>. Tous droits réservés
                    </div>
                    <div class="credits">
                      
                    designé et implémenté par <a href="">Kasime Mohamed et Ruben Butu</a>>
                    </div>
                </div>
                <div class="col-lg-6">
                <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="{{ route('index')}}" class="scrollto">Accueil</a>
                        <a href="{{ route('defunts')}}" class="scrollto">defunts</a>
                        <a href="{{ route('createFamille')}}" class="scrollto">Famille</a>
                        <a href="{{ route('createUser')}}" class="scrollto">Créer compte</a>                  
                        <a href="#">A propos de Nous</a>
                        <a href="#">Guide d'utilisation</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- <a href="# " class="back-to-top d-flex align-items-center justify-content-center "><i class="bi bi-arrow-up-short "></i></a> -->
    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js "></script> -->
    <!-- <script src="assets/vendor/aos/aos.js "></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js "></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js "></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js "></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js "></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js "></script> -->

    <!-- Template Main JS File -->
    <script src="assets/js/main.js "></script>

</body>

</html>

</div>
</div>
</footer>
<!-- End Footer -->

<a href="# " class="back-to-top d-flex align-items-center justify-content-center "><i class="bi bi-arrow-up-short "></i></a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz " crossorigin="anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!-- Vendor JS Files -->
<!-- <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}} "></script> -->
<!-- <script src="{{asset('assets/vendor/aos/aos.js')}} "></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}} "></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/js/glightbox.min.js"></script>
<!-- <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}} "></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<!-- <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}} "></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
<!-- <script src="{{asset('assets/vendor/php-email-form/validate.js')}} "></script> -->

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js')}} "></script>
<script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    <script>
            const config = {
    search: true, // Toggle search feature. Default: false
    creatable: false, // Creatable selection. Default: false
    clearable: false, // Clearable selection. Default: false
    maxHeight: '360px', // Max height for showing scrollbar. Default: 360px
    size: '', // Can be "sm" or "lg". Default ''
}
     dselect(document.querySelector('#cmbFamille'), config)
     dselect(document.querySelector('#cmbCim'), config)

        $(document).ready(function(){

            $('#fichier').change(function(e){
                var reader=new FileReader();           
                reader.onload=function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
                // console.log('okay');
            })
            $('#defuntImg').change(function(e){
                var reader=new FileReader();           
                reader.onload=function(e){
                    $('#defuntShow').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
                // console.log('okay');
            })
            $('#defuntCimImg').change(function(e){
                var reader=new FileReader();           
                reader.onload=function(e){
                    $('#cimShow').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
                console.log('okay');
            })
            $('#videos').change(function(e){
                var reader=new FileReader();           
                reader.onload=function(e){
                    $('#video').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
                console.log('okay');
            })
        })

    
    </script>

</body>

</html>