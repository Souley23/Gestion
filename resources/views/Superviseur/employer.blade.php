@extends('layouts.moderator')
	@section('moderator')


	    <div class="container">


	        <a href="{{route('ajout_employers')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Employer</a>
	    </div>


	    <div class="content-wrapper">
	        <!-- Content Header (Page header) -->
	        <section class="content-header">
	            <div class="container-fluid">
	                <div class="row mb-2">
	                    <div class="col-sm-6">
	                        <h1>Liste Employers</h1>
	                    </div>
	                    <div class="col-sm-6">
	                        <ol class="breadcrumb float-sm-right">
	                            <li class="breadcrumb-item"><a href="#">Home</a></li>
	                            <li class="breadcrumb-item active">Liste Employers</li>
	                        </ol>
	                    </div>
	                </div>
	            </div><!-- /.container-fluid -->
	        </section>


	        <!-- Main content -->
	        <section class="content">
	            <div class="row">
	                <div class="col-12">
	                    <div class="card ">
	                        <div class="card-header">
	                            <h3 class="card-title">Listes des Employer</h3>
	                        </div>
	                        <!-- /.card-header -->
	                        <div class="card-body">
	                            <table id="example2" class="table table-bordered table-hover">
	                                <thead>
	                                <tr>
	                                    <th>nom</th>
	                                    <th>prenom</th>
	                                    <th>Matircule</th>
	                                    <th>Fonction</th>
	                                    <th>statut</th>
	                                    <th>email</th>
	                                    <th>telephone</th>
	                                    <th>adresse</th>
	                                    <th>details</th>
	                                </tr>
	                                </thead>
	                                <tbody>
	                                @foreach($persos as $perso)
	                                <tr>
	                                    <td>{{$perso->nom}}</td>
	                                    <td>{{$perso->prenom}}</td>
	                                    <td>{{$perso->matricule}}</td>
	                                    <td>{{$perso->fonction}}</td>
	                                    <td>{{$perso->statut}}</td>
	                                    <td>{{$perso->email}}</td>
	                                    <td>{{$perso->telephone}}</td>
	                                  <td>{{$perso->adresse}}</td>
	                                  <td><button class="btn btn-primary btn-lg active">detail</button></td>
	                                @endforeach
	                                 <tr aria-label="...">
	                                    {{$persos->links()}}
	                                </tr>
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>
	        <script>
	            $(function () {
	                $("#example1").DataTable();
	                $('#example2').DataTable({
	                    "paging": true,
	                    "lengthChange": false,
	                    "searching": false,
	                    "ordering": true,
	                    "info": true,
	                    "autoWidth": false,
	                });
	            });
	        </script>
	@endsection
