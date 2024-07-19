@extends('base')
@section('content')
<div class="row pb-3" style="margin-top: 55px;">
        <div class="col-sm-12 ">
            <div class=" mr-2 ml-3 px-2 ">
                <!-- Profile widget -->
                <div class="shadow rounded overflow-hidden">
                    <div class="px-4 pt-0 pb-4 cover"style=" background-image: url({{ (!empty($Defunt->avatar_cim)) ? url('upload/cimetiere_images/'.$Defunt->avatar_cim) :url('upload/login.png') }})">
                        <div class="media align-items-end profile-head" >
                            <div class="profile mr-1 ">
                                <img src="{{ (!empty($Defunt->avatar_def)) ? url('upload/dead_images/'.$Defunt->avatar_def) :url('upload/login.png') }}" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                                <!-- <a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a> -->
                            </div>
                            <div class="media-body mb-5 ">
                                <h4 class="mt-0 mb-0">{{$Defunt->nom}}</h4>
                                <!-- <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>New York</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-5 pb-3 pl-2 pt-4 pl-4">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12" >
                                <div class=" card shadow bg-tertiary  " style="width: 100%; " data-aos="fade-up">
                                    <div class="card-header fs-3" style="background-color: #D65DB1;">
                                        Informations détaillées
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$Defunt->nom}}  {{$Defunt->prenom}}</h5>
                                        <p class="card-text fs-4">{{$Defunt->commentaire}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @isset($Defunt)
                                            <div class="alet alert-success ">
                                                
                                            </div>
                                        @endisset
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <h5>Nom :</h5>
                                            <H5>{{$Defunt->nom}}</H5>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <h5>Postnom :</h5>
                                            <H5>{{$Defunt->postnom}}</H5>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <h5>Prenom :</h5>
                                            <H5>{{$Defunt->prenom}}</H5>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <h5>Date de naissance :</h5>
                                            <H5>{{$Defunt->date_naissance}}</H5>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <h5>Date de décès :</h5>
                                            <H5>{{$Defunt->date_deces}}</H5>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <h5>Date de l'enterrement :</h5>
                                            <h5>{{$Defunt->date_enterrement}}</h5>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <h5>Famille :</h5>
                                            <H5>{{$Defunt->Famille->nom}}</H5>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <a href="{{ route('oraison',['defunt'=>$Defunt])}}" class=" btn btn-info btn-sm">Lire oraison</a>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                            <div class="col-sm-8 " >
                        
                                <div class="card ">
                                    <div class="card-body bg-tertiary" data-aos="afde-down">
                                  @auth
                                        <h5 class="card-title" style="color:#D65DB1 ;">Rendre Hommage</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="alert" id="alert">
                                            @if(session("success"))
                                                        <div class="alert alert-success">
                                                            {{session('success')}}
                                                        </div>
                                                    @endif
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-sm-4  mains">
                                                <form method="POST" action="javascript:void(0)" class="myForm" data-aos="fade-up" id="mesText">
                                                    @csrf
                                                    
                                                   
                                                    
                                                        <div>
                                                            <textarea name="contenu" id="" cols="30" rows="10">{{old('contenu','')}}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                        <!-- <input type="hidden" name="contenu" class="form-control" id="quillHim" placeholder="name@example.com"> -->
                                                        <input type="hidden" name="defunt_id" value="{{$Defunt->id}}">
                                                    </div>
                                                    <button type="submit" id="btnSubmit" class="btn btn-outline-primary">Rendre Hommage</button>
                                                </form>
                                            </div>
                                            <div class="col-sm-4 shadow mains">
                                                <button class="mic-toggle" id="mic">
                                                        <span class="material-icons">mic</span>
                                                    </button>
                                                    <audio class="playback" style="width: 80%;" controls></audio>
                                                <form action="{{route('addHommage')}}" method="post" enctype="multipart/form-data" class="pb-0" id="mesAudio">
                                                    @csrf
                                                    <div class="d-flex flex-column gap-3 mt-2">
                                                        <input type="hidden" value="1" name="isAudio">
                                                        <input type="hidden" name="defunt_id" value="{{$Defunt->id}}">
                                                        <!-- <input type="file" class="form-control btn-sm" name="audios" id="audio"> -->
                                                        <input type="hidden" name="aud" id="aud" >
                                                    
                                                        <button class="btn btn-outline-info" id="btnSubmitAudio" type="submit">envoyer</button>
                                                    </div>
                                                    
                                                </form>
                                                 
                                                    <!-- <i class="fa fa-microphone" id="icon-record-audio" onclick="recordAudio()" style="cursor: pointer;"></i> -->

                                             </div>
                                             <div class="col-md-4 ">
                                                <video src="{{ asset('assets/img/github.mp4')}}" poster="{{ asset('assets/img/kas4.jpg')}}" controls width="100%" height="50%" id="video"></video>
                                                <form action="{{route('addHommage')}}" method="post" enctype="multipart/form-data" class="mt-5" >
                                                    @csrf
                                                    <div class="d-flex flex-column gap-3 mt-2">
                                                        <input type="hidden" value="2" name="isVideo">
                                                        <input type="hidden" name="defunt_id" value="{{$Defunt->id}}">
                                                        <input type="file" class="form-control btn-sm" name="videos" id="videos">
                                                        @error('videos')
                                                        {{$message}}
                                                        @enderror
                                                    
                                                        <button class="btn btn-outline-info" id="btnSubmitVideo" type="submit">envoyer</button>
                                                    </div>
                                                    
                                                </form>
                                             </div>
                                            
                                               
                                                
                                    </div>
                                            
                                            
                                    
                                       

                                           
                                       
                                        
                                        <!-- End Quill Editor Default -->
                                        <section class="review" id="review">

                                            <div class="container">

                                                <h1 class="heading"><span>'</span> Les hommages <span>'</span></h1>
                                                    
                                                <div class="box-container" data-aos="fade-up" id="box-container">
                                                        @forelse($Defunt->Hommages as $hommage)
                                                    <div class="box">
                                                        @if(Str::contains($hommage->contenu,'audio.mp4'))
                                                            <audio src="{{url($hommage->contenu)}}" style="width: 80%;" controls ></audio>
                                                        @elseif(Str::contains($hommage->contenu,'video'))
                                                        <video src="{{url('upload/videos_files/'.$hommage->contenu)}}" poster="{{ asset('assets/img/kas4.jpg')}}" controls width="100%" height="30%" id="video"></video>
                                                        @else
                                                        <p>{{$hommage->contenu}}</p>

                                                        @endif
                                                        <h3>{{$hommage->User->nom}}</h3>
                                                        <span>{{$hommage->created_at}}</span>
                                                        <img src="{{url('upload/users_images/'.$hommage->User->avatar)}}" alt="">
                                                    </div>
                                                        @empty
                                                        <div class="col" id="pasHommage">Pas d'hommmages disponibles Pour ce défunt</div>
                                                        @endforelse
        
                                                </div>
                                                @endauth
                                                    
                                                    @guest
                                                        <div class="col">
                                                        <h4>Veillez vous connecter pour plus de conténus</h4>
                                                        <a href="{{route('login')}}" class="btn-get-started scrollto">me connecter</a>

                                                        </div>
                                                    @endguest

                                            </div>

                                        </section>
                                </div>
                            </div>



                        </div>



                    </div>
                        <!-- <h5 class="card-title ">Card title</h5>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <!-- <a href="# " class="btn btn-outline-primary ">Voir plus</a> -->
                    </div>

                </div>

            </div>

        </div>



    </div>
@endsection