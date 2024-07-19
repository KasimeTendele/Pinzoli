@extends('admin.adminBase')
@section('content')
    
<main id="main" class="main">

<div class="pagetitle">
    <h1>Tableau de bord</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-sm-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Défunts <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($defunts)}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- famille -->
                <div class="col-xxl-4 col-sm-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Famille <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($familles)}}</h6>
                                    <span class="text-success small pt-1 fw-bold"></span>{{$lastFamille->created_at}}<span class="text-muted small pt-2 ps-1"> Dernier</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-sm-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">cimétières <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-dead"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($cimetieres)}}</h6>
                                    <span class="text-success small pt-1 fw-bold">{{$lastCim->created_at}}</span> <span class="text-muted small pt-2 ps-1">Dernier</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-sm-12">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Utilisateurs <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($users)}}</h6>
                                    <span class="text-danger small pt-1 fw-bold">{{$lastUser->created_at}}</span> <span class="text-muted small pt-2 ps-1">Dernier</span>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- End Customers Card -->



            </div>
        </div>
        <!-- End Left side columns -->



    </div>
</section>

</main>
<!-- End #main -->

@endsection