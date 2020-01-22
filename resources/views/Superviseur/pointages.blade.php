@extends('layouts.moderator')
	@section('moderator')
	    <div class="content-wrapper">
	        <!-- Content Header (Page header) -->
	        <section class="content-header">
	            <div class="container-fluid">
	                <div class="row mb-2">
	                    <div class="col-sm-6">
	                        <h1>Tableau des Pointages</h1>
	                    </div>
	                    <div class="col-sm-6">
	                        <ol class="breadcrumb float-sm-right">
	                            <li class="breadcrumb-item"><a href="#">Home</a></li>
	                            <li class="breadcrumb-item active">Tableau des pointage</li>
	                        </ol>
	                    </div>
	                </div>
	            </div><!-- /.container-fluid -->
	        </section>


	        <!-- Main content -->
	        <section class="content">
	            <div class="row">
	                <div class="col-12">
	                    <div class="card">
	                        <div class="card-header">
	                            <h3 class="card-title">pointage</h3>
	                        </div>
	                        <!-- /.card-header -->
	                        <div class="card-body">
	                            <table id="example2" class="table table-bordered table-hover">
	                                <thead>
	                                <tr class="tete">
	                                    <th>DatePointer</th>
	                                    <th>Nons</th>
	                                    <th>Prenoms</th>
	                                    <th>Matricules</th>
	                                    <th>Heures Travailler</th>
	                                    <th>Absence</th>
	                                    <th>Motifs</th>
	                                    <th>Departments</th>
	                                </tr>
	                                </thead>
	                                <tbody>
	                                @foreach($pointer as $pt)
	                                    <tr>
	                                        <td>{{$pt->datejr}}</td>
	                                        <td>{{$pt->nom}}</td>
	                                        <td>{{$pt->prenom}}</td>
	                                        <td>{{$pt->matricule}}</td>
	                                        <td>
	                                          <?php
	                                            $h1=strtotime("$pt->heure_sorti");
	                                            $h2=strtotime("$pt->heure_arrive");
	                                            echo $date = date('H:i',$h1-$h2);
	                                          ?>
	                                        </td>
	                                        <td>{{$pt->absence}}</td>
	                                        <td>{{$pt->motif }}</td>
	                                        <td>{{$pt->nom_departemet}}</td>
	                                @endforeach
	                                <tr aria-label="...">
	                                    {{$pointer->links()}}
	                                </tr>
	                                </tbody>


	                            </table>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>
	    @endsection
