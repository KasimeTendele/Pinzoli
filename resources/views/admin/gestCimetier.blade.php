@extends('admin.adminBase')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
    <h1>Gestion des cimétières</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
    </nav>
</div>

<section>
        <div class="row pb-3">
            <div class="col-sm-12 d-flex align-items-center gap-2">
                <form action="{{ route('updateCim',['cimetiere'=>1])}}" method="POST">
                    @csrf
                    @if(session('reussite'))
                    <div class="col alert alert-success">
                        {{session('reussite')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$nom->nom}}" name="nom" placeholder="nom_cimétière">
                        <input type="hidden" class="form-control" value="{{$nom->id}}" name="id" >
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-1">
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </div>
                    
                </form>
                <form action="{{ route('addCim')}}" method="POST">
                    @csrf
                    @if(session('success'))
                    <div class="col alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{old('nom','')}}" name="nom" placeholder="nom_cimétière">
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-1">
                        <button type="submit" class="btn btn-info">Enregistrer</button>
                    </div>
                    
                </form>
            </div>
          
            </div>

        </div>
    <form action=""></form>
    <table class="table table-hover table-stripped " id="todo_table">
        <thead class="table-dark">
            <th>Nom</th>
            <th>Adresse</th>
            <th>date_céation</th>
            <th class="text-end" >Action sur le cimetièer</th>
        </thead>
        <tbody class="">
            @forelse($cimetieres as $util)
                <tr class="table-sm">
                    <td>{{$util->nom}}</td>
                    <td>{{$util->adresse}}</td>
                    <td>{{$util->created_at}}</td>

                    <td >
                    <form class="d-flex justify-content-end align-items-center gap-2 hover">
                        <a href="{{route('gestCim',['cimetiere'=>$util])}}" class="btn btn-info btn-sm">Modifier</a>
                        <button class="btn btn-warning btn-sm">Supprimer</button>
                    </form>
                </td>
                </tr>
            @empty
            @endforelse

            
        </tbody>
    </table>
</section>
</main>
@endsection