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
<section>
    <div class="row">
        <div class="col-md-12" id="alert">
           

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-hover table-stripped table-responsive " id="todo_table">
        <thead class="table-dark">
            <th>Nom</th>
            <th>Postnom</th>
            <th>Prenom</th>
            <th>Contenu</th>
            <th>date_création</th>
            <th>role</th>
            <th>photo</th>

            <th >Action</th>
        </thead>
        <tbody class="">
            @forelse($messages as $mes)
                <tr class="table-sm">
                    <td>{{$mes->User->nom}}</td>
                    <td>{{$mes->User->postnom}}</td>
                    <td>{{$mes->User->prenom}}</td>
                    <td>{{$mes->contenu}}</td>
                    <td>{{$mes->created_at}}</td>
                    <td class="{{ $mes->role != 'admin'? '':'bg-warning'}}">{{$mes->User->role}}</td>
                    <td>
                        <img src="{{ (!empty($mes->User->avatar)) ? url('upload/users_images/'.$mes->User->avatar) :url('upload/login.png') }}" alt="" class="img img-rounded-circle" style="width:50px;height:50px">
                    </td>


                    <td >
                    <div class="d-flex justify-content-end align-items-center gap-2 hover">
                        <form action="javascript:void(0)" method="POST" id="destroNotif">
                            @csrf
                            <input type="hidden" name="notification" value="{{$mes->id}}">
                           <button class="btn btn-warning btn-sm" id="btnSup" type="submit" >Supprimer</button>

                        </form>
                    </div>
                </td>
                </tr>
            @empty
            @endforelse

            
        </tbody>
    </table>
        </div>

    </div>


</section>
</main>
@endsection