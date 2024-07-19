@extends("base2")
@section('content')
<section class="order " id="order">

<!-- <h3 class=" sub-heading "> Nous écrire</h3> -->
<!-- <h1 class="heading text-center"> Création d'un nouvel article </h1> -->


<form action="{{ route('storeUser') }}" enctype="multipart/form-data" method="POST" data-aos="fade-up">
    @csrf
    @if(session('success'))
        <div class="alert alert-success" style="font-size: 1.5rem;">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" style="font-size: 1.5rem;">
            {{session('error')}}
        </div>
    @endif
    <div class="explication">
        <img src="{{asset('assets/img/OIP.jpg')}}" alt="" id="showImage" style="opacity: .5;">
    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>Votre nom</span>
            <input type="text " placeholder="Entrez votre nom ici " name="nom">
            @error('nom')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <span>Votre postnom</span>
            <input type="text " placeholder="Entrez votre postnom ici " name="postnom">
            @error('postnom')
                {{$message}}
            @enderror
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>Votre prenom</span>
            <input type="text " placeholder="Entrez votre prenom ici " name="prenom">
            @error('prenom')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <span>Adresse Mail</span>
            <input type="text " placeholder="Entrez votre email ici " name="email">
            @error('email')
                {{$message}}
            @enderror
        </div>

    </div>



    <div class="inputBox ">
        <div class="input ">
            <select name="sexe" id="" class="" aria-label="default select example" >
                <option value="" selected>sexe</option>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
            </select>
            @error('sexe')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <select name="famille_id" id="cmbFamille" class="" aria-label="default select example">
                @foreach($familles as $famille)
                <option value="{{$famille->id}}">{{$famille->nom}}</option>
                @endforeach
               
            </select>
            @error('famille')
                {{$message}}
            @enderror
        </div>

    </div>
    <div class="inputBox ">

        <div class="input ">
            <span>inserrer votre photo de profile</span>
            <input type="file" name="avatar" id="fichier">
            @error('avatar')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <span>Mot de passe</span>
            <input type="text " name="password" placeholder="Entrez votre Mot de passe">
            @error('password')
                {{$message}}
            @enderror
        </div>
    </div>

    <!-- <input type="submit" value="Envoyer " class="btn"> -->
    <button type="submit" class="btnEnvoi">envoyer</button>
  

</form>

</section>
@endsection