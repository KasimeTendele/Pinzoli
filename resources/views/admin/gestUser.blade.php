@extends('admin.adminBase')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
    <h1>Gestion des utilisateurs</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acuueil</a></li>
            <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
    </nav>
</div>

<section>
    @if(session('error'))
        <div class="alert alert-warning">
            <h3>{{session('error')}}</h3>
        </div>
    @endif
    <table class="table table-hover table-stripped " id="todo_table">
        <thead class="table-dark">
            <th>Nom</th>
            <th>Postnom</th>
            <th>Prenom</th>
            <th>sexe</th>
            <th>date_création</th>
            <th>Role</th>

            <th >Action</th>
        </thead>
        <tbody class="">
            @forelse($users as $util)
                <tr class="table-sm">
                    <td>{{$util->nom}}</td>
                    <td>{{$util->postnom}}</td>
                    <td>{{$util->prenom}}</td>
                    <td>{{$util->sexe}}</td>
                    <td>{{$util->created_at}}</td>
                    <td class="{{ $util->role != 'admin'? '':'bg-warning'}}">{{$util->role}}</td>

                    <td >
                    <div class="d-flex justify-content-end align-items-center gap-2 hover">
                        <a href="{{route('adminiser',['user'=>$util])}}" class="btn btn-info btn-sm">changer role</a>
                        <button class="btn btn-warning btn-sm">Supprimer</button>
                    </div>
                </td>
                </tr>
            @empty
            @endforelse

            
        </tbody>
    </table>
</section>
</main>
@endsection