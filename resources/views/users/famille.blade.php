@extends('base2')
@section('content')
    
<section class="order " id="order">

<!-- <h3 class=" sub-heading "> Nous écrire</h3> -->
<!-- <h1 class="heading text-center"> Création d'un nouvel article </h1> -->


<form action="{{ route('storeFamille') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <!-- <div class="explication">
        <img src="assets/img/raissa.jpg" alt="">
    </div> -->
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" style="font-size: 1.5rem;">
        {{session('error')}}
    </div>
    @endif
    <div class="inputBox ">
        <div class="input ">
            <span>Le nom de la famille </span>
            <input type="text " placeholder="Entrez le nom de la famille " name="nom" value="{{old('nom', '')}}">
            @error('nom')
                {{ $message }}
            @enderror
        </div>
        <div class="input ">
            <span>Téléphone</span>
            <input type="text " placeholder="Entrez l'adresse de la famille " name="telephone" value="{{old('telephone', '')}}">
            @error('telephone')
                {{$message}}
            @enderror
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>l'adresse emaile de la famille</span>
            <input type="email" name="email" placeholder="Entrez l'adresse mail de la famille " value="{{old('email', '')}}">
            @error('email')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
        <span>Type de famille</span>
            <select name="type" id="" class="" aria-label="default select example" >
                <!-- <option value="" selected>{{old('type', '')}}</option> -->
                <option value="VIP">VIP</option>
                <option value="NORMALE">NORMALE</option>
            </select>
            @error('type')
                {{$message}}
            @enderror
        </div>

    </div>
    <div class="input ">
            <span>Adresse</span>
            <textarea name="adresse" id="" cols="30" rows="5">{{old('adresse', '')}}</textarea>
            @error('adresse')
                {{$message}}
            @enderror
        </div>




    <button type="submit" class="btnEnvoi">Envoyer</button>
    <!-- <input type="submit " value="Envoyer " class="btn"> -->

</form>

</section>
@endsection