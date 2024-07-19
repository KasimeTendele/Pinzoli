@extends('base')
@section('content')
<section class="deces">
        <h1>Les défunts </h1>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <form class="d-flex mt-3" role="search" method="GET" action="">
                    <input class="form-control me-2" type="search" id="defuntSearch" name="defuntSearch" placeholder="Search" aria-label="Search" value="{{$input['defuntSearch'] ?? ''}}">

                    <!-- <select name="cimetiere_id" id="" class="form-control" aria-label="default select example" value="{{ old('cimetiere_id','')}}">
                @foreach($cimetieres as $cimetiere)
                <option value="{{$cimetiere->id}}">{{$cimetiere->nom}}</option>
                @endforeach -->
               
            </select>
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            </div>
            <div class="col-sm-2"></div>

        </div>

        <div class=" py-5 px-4 d-sm-flex justify-content-between align-items-center flex-wrap ">
        @forelse($defunts as $defunt)
            <div class=" mr-2 ml-3 swiper-slide " data-aos="fade-up" style="width: 22rem;">
                <!-- Profile widget -->
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="px-4 pt-0 pb-4 cover" style=" background-image: url({{ (!empty($defunt->avatar_cim)) ? url('upload/cimetiere_images/'.$defunt->avatar_cim) :url('upload/login.png') }})">
                        <div class="media align-items-end profile-head">
                            <div class="profile mr-1 ">
                                <img src="{{ (!empty($defunt->avatar_def)) ? url('upload/dead_images/'.$defunt->avatar_def) :url('upload/login.png') }}" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                                <!-- <a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a> -->
                            </div>
                            <div class="media-body mb-5 text-white">
                                <h4 class="mt-0 mb-0">{{ $defunt->nom}}  {{$defunt->postnom}}</h4>
                                <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>New York</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-5 pb-3 pl-2 pt-4 pl-4">
                        <h5 class="card-title"></h5>
                        <p class="card-text">{{ Str::words( $defunt->commentaire,10) }}</p>
                        <a href="{{ route('defunt.show',['Defunt'=>$defunt]) }}" class="btn btn-outline-primary">Voir plus</a>
                    </div>

                </div>
            </div>
        @empty
            <div class="col">
                pas de défunt enregistré
            </div>
        @endforelse

         

        </div>
        <div class="swiper-pagination"></div>
    </section>
{{$defunts->links()}}

@endsection