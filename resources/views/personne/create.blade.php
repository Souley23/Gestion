@extends('layouts.adminlay')

@section('admin')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Formulaire General</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content color">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ajout Employer</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="{{route('ajout_employer')}}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">nom</label>
                                            <input type="text" class="form-control" name="nom" placeholder="Entrer nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Prenom</label>
                                            <input type="text" class="form-control" name="prenom" placeholder="Entrer prenom">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Matricule</label>
                                            <input type="number" class="form-control" name="matricule" value="{{(rand(2000,100000))}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Statut</label>
                                            <input type="text" class="form-control" name="statut" placeholder="Votre status">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fonction</label>
                                            <input type="text" class="form-control" name="fonction" placeholder="Votre Fonction">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Departement</label>
                                                <select name="department_id" id="department_id" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($depperso as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Adresse email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Votrer votre adresse email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Numero telephone</label>
                                            <input type="text" class="form-control" name="telephone"  placeholder="numero telephone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Domicile</label>
                                            <input type="text" class="form-control" name="adresse" placeholder=" adresse domicile">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Enregistrement departement</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="form-horizontal" action="{{route('adddepart')}}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nom_departemet" placeholder="Nom departement">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Ajouter</button>
                                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Planification Conges</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="{{route('Conges')}}" method="post" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>date debut</label>
                                                    <input type="date" name="date_debut" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>date fin</label>
                                                    <input type="date" name="date_fin" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Motif Conges</label>
                                                    <textarea class="form-control" rows="3" name="motif" placeholder="Motif conge ..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select name="personne_id" id="personne_id" class="form-control">
                                                <option value=""></option>
                                                @foreach($conges as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info">Ajouter</button>
                                            <button type="submit" class="btn btn-default float-right">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- general form elements disabled -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Tableau de Pointage</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="{{route('pointage')}}" method="post" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>date du jour</label>
                                                    <input type="date" class="form-control" name="datejr" value="{{date('Y-m-d')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Heure d'arrive</label>
                                                    <input type="time" class="form-control" name="heure_arrive">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Heure de sortie</label>
                                                    <input type="time" class="form-control" name="heure_sorti">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">

                                                    <input class="form-check-input" name="absence" value="Absent" type="checkbox">
                                                    <label class="form-check-label">Absence</label>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Motif absence</label>
                                                    <textarea class="form-control" rows="3" name="motif" placeholder="Motif conge ..."></textarea>
                                                </div>
                                            </div>
                                        <div class="col-sm-6">
                                            <!-- textarea -->
                                           <div class="form-group">
                                                <label>Matricule Employer</label>
                                                <select name="personne_id" name="personne_id" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($conges as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
</div>
@endsection
