@extends('admin.adminBase')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
    <h1>Gestion des défunts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
    </nav>
</div>


<section>
    <table class="table table-hover table-stripped " id="todo_table">
        <thead class="table-dark">
            <th>Nom</th>
            <th>Postnom</th>
            <th>Prenom</th>
            <th>sexe</th>
            <th>date_naissance</th>
            <th>date_décès</th>
            <th>date_enterrement</th>

            <th >Action</th>
        </thead>
        <tbody class="">
            @forelse($defunts as $util)
                <tr class="table-sm">
                    <td>{{$util->nom}}</td>
                    <td>{{$util->postnom}}</td>
                    <td>{{$util->prenom}}</td>
                    <td>{{$util->sexe}}</td>
                    <td>{{$util->date_naissance}}</td>
                    <td>{{$util->date_naissance}}</td>
                    <td>{{$util->date_enterrement}}</td>
                  

                    <td >
                    <div class="d-flex justify-content-end align-items-center gap-2 hover">
                        <a href="{{ route('callUpdater',['defunt'=>$util])}}" class="btn btn-info btn-sm">Modifier</a>
                        <button class="btn btn-warning btn-sm">Supprimer</button>
</div>
                </td>
                </tr>
            @empty
                <tr>
                    Pas d'enregistrement trouvé
                </tr>
            @endforelse

            
        </tbody>
    </table>
</section>
</main>
@endsection