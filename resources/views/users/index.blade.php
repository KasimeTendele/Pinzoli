@extends('base')
@section('title',"page d'accueil")
<!-- @section('title','Toutes les options ') -->

@section('content')

    <!-- ======= section ======= -->
    <section id="hero" class="d-flex align-items-center ">

        <div class="container">
            <div class="row  ">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Parce qu'ils sont gravés dans nos coeurs</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">partageons ces souvenirs précieux aux futures générations</h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        @auth
                        <a href="#about" class="btn-get-started scrollto">Créer défunt</a>
                        @endauth
                        @guest
                        <a href="{{route('login')}}" class="btn-get-started scrollto">me connecter</a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 d-flex  hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="assets/img/kas4.jpg" class=" img-fluid  animated " alt=" ">
                </div>
            </div>
        </div>

    </section>
    <!-- fin section -->




    <section class="deces swiper">
        <h1>Les personnes décédées récemments </h1>
        <div class=" py-5 px-4 swiper-wrapper">


            @forelse($defunts as $defunt)
            <div class=" mr-1 ml-1 swiper-slide " data-aos="fade-up">
                <!-- Profile widget -->
                <div class="bg-tertiary shadow rounded overflow-hidden">
                    <div class="px-4 pt-0 pb-4 cover" style=" background-image: url({{ (!empty($defunt->avatar_cim)) ? url('upload/cimetiere_images/'.$defunt->avatar_cim) :url('upload/login.png') }})">
                        <div class="media align-items-end profile-head">
                            <div class="profile mr-1 ">
                                <img src="{{ (!empty($defunt->avatar_def)) ? url('upload/dead_images/'.$defunt->avatar_def) :url('upload/login.png') }}" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                                <!-- <a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a> -->
                            </div>
                            <div class="media-body mb-5 text-white">
                                <h4 class="mt-0 mb-0">{{ $defunt->nom}}  {{$defunt->postnom}}</h4>
                                <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $defunt->Cimetiere->nom}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-5 pb-3 pl-2 pt-4 pl-4">
                        <h5 class="card-title"></h5>
                        <div style="height: 35px;">
                        <p class="card-text" >{{ Str::words( $defunt->commentaire,5) }}</p>
                        </div>
                        <a href="{{ route('defunt.show',['Defunt'=>$defunt->id]) }}" class="btn btn-outline-primary">Voir plus</a>
                        
                    </div>

                </div>
            </div>
            @empty
            <div>
                pas de défunt enregistré
            </div>
            @endforelse
          
           

        </div>
        <div class="swiper-pagination"></div>
    </section>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Nous contacter</h2>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-about">
                        <h3>Matanga</h3>
                        <p class="text-break fs-5">Matanga App est une plateforme qui propose un cadre commémoratif d 'un défunt de manière virtuelle. Au regard d 'un quotidien parfois chargé, Matanga App s 'offre en solution pour témoigner nos sentiments à l 'égard de celle ou
                            celui qui nous a été cher(e). Cette plateforme incarne l 'idée d 'un cimetière virtuel.</p>
                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="info">
                        <div>
                            <i class="ri-map-pin-line fs-5"></i>
                            <p class="fs-5,">Av Boulevard du 30 juin , Kinshasa-Gombe <br>République Démocratique du Congo</p>
                        </div>

                        <div>
                            <i class="ri-mail-send-line"></i>
                            <p class="fs-5">contact@matanga-app.com</p>
                        </div>

                        <div>
                            <i class="ri-phone-line"></i>
                            <p class="fs-5">+243 821 234 567</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                   
                    <div class="alert " id="alert">
                        
                    </div>
                 
                    <form action="javascript:void(0)" method="post" id="formMessage" role="form" class="php-email-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" id="name" placeholder="Votre nom" value="{{old('nom','')}}" required>
                            @error('nom')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email"  value="{{old('email','')}}" required>
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                       
                        <div class="form-group">
                            <textarea class="form-control" name="contenu" rows="5" placeholder="Message"  value="{{old('contenu','')}}" required></textarea>
                            @error('contenu')
                            {{$message}}
                            @enderror
                        </div>
                    
                        
                        <div class="text-center">
                            @auth
                        <button type="submit" id="envoyer" >envoyer</button>
                        @endauth
                        </div>
                  
                       
                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->




@endsection