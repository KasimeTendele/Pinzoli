@extends('base2')
@section('content')

<section class="order " id="order">

<!-- <h3 class=" sub-heading "> Nous écrire</h3> -->
<!-- <h1 class="heading text-center"> Création d'un nouvel article </h1> -->


<form action="{{ route('storeDead')}}" enctype="multipart/form-data" method="post" data-aos="fade-up">
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
    <!-- <div class="explication">
        <img src="assets/img/raissa.jpg" alt="">
    </div> -->

    <div class="photos">
        <img src="assets/img/raissa.jpg" alt="Cliquez pour inserrer une image" id="defuntShow">
        <img src="assets/img/raissa.jpg" alt="" id="cimShow">
    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>photo du défunt</span>
            <input type="file" placeholder="Entrez le nom du défunt ici " name="avatar_def" id="defuntImg">
        </div>
        <div class="input ">
            <span> pImage de la tombe</span>
            <input type="file" placeholder="Entrez le postnom du défunt ici " name="avatar_cim" id="defuntCimImg">
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>nom du défunt</span>
            <input type="text " placeholder="Entrez le nom du défunt ici " name="nom" value="{{  old('postnom','')}}">
            @error('nom')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <span> postnom du défunt</span>
            <input type="text " placeholder="Entrez le postnom du défunt ici " name="postnom"value="{{ old('postnom','')}}">
            @error('postnom')
                {{$message}}
            @enderror
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>prenom</span>
            <input type="text " placeholder="Entrez le prenom du défunt ici " name="prenom" value="{{ old('prenom','')}}">
            @error('prenom')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <span>sexe</span>

            <select name="sexe" id=" " class=" " aria-label="default select example " value="{{ old('sexe','')}}">
                <option value=" " selected>Sexe</option>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
            </select>
            @error('sexe')
                {{$message}}
            @enderror
        </div>

    </div>

    <div class="inputBox ">
        <div class="input ">
            <span>Famille</span>
             <select name="famille_id" id="cmbFamille" class="" aria-label="default select example" value="{{ old('famille_id','')}}">
                @foreach($familles as $famille)
                <option value="{{$famille->id}}">{{$famille->nom}}</option>
                @endforeach
               
            </select>
            @error('famille')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <span>cimetière</span>
          <select name="cimetiere_id" id="cmbCim" class="" aria-label="default select example" value="{{ old('cimetiere_id','')}}">
                @foreach($cimetieres as $cimetiere)
                <option value="{{$cimetiere->id}}">{{$cimetiere->nom}}</option>
                @endforeach
               
            </select>
            @error('cimetiere_id')
                {{$message}}
            @enderror
        </div>
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>Date de naissance</span>
            <input type="date" placeholder=" Entrez la Date de naissance du défunt" name="date_naissance"value="{{ old('date_naissance','')}}">
            @error('date_naissance')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <span>date de décès</span>
            <input type="date" placeholder="Entrez la Date de décès du défunt" name="date_deces" value="{{ old('date_deces','')}}">
            @error('date_deces')
                {{$message}}
            @enderror
        </div>

    </div>




    <div class="inputBox ">

        <div class="input ">
            <span>Le fichier pdf oraison funèbre</span>
            <input type="file" name="oraison">
            @error('oraison')
                {{$message}}
            @enderror
        </div>
        <div class="input ">
            <span>date de l'enterrement</span>
            <input type="date" placeholder="Entrez la Date de l'enterrement du défunt" name="date_enterrement" value="{{ old('date_deces','')}}">
            @error('date_enterrement')
                {{$message}}
            @enderror
        </div>
        
    </div>
    <div class="input ">
            <span>commentaire</span>
            <textarea name="commentaire" id="" cols="30" rows="2">{{old('commentaire', '')}}</textarea>
            @error('commentaire')
                {{$message}}
            @enderror
        </div>

    <button type="submit" class="btnEnvoi">envoyer</button>


</form>

</section>
@endsection