<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get("/register/{id}", "\App\Http\Controllers\Auth\RegisterController@register")->name("register");

/*Route::get("/", "produitController@index");

Route::get("/produits/{id}", function($id) {
    return "Je suis le produit $id";
});

*/

Route::get("/login", function(){
    return view('login')->name('login');
});

Route::get("/commentaire/{id}", "commentsController@show");
Route::get("/backoffice", "BackofficesController@back");
Route::get("/conteneur", function(){
    return view('conteneur');
});
//Enregistrenemt personnes et edit
Route::get("/acceuil", "HomeController@acceuil")->name('acceuil');
Route::get("/create", "PersonneController@create")->name('ajout_employers');
Route::post("personne/create", "PersonneController@store")->name('ajout_employer');
Route::get('acceuil/{id}/edit',"PersonneController@edit")->name("edit_employer");
Route::patch('update/{id}/edit', 'PersonneController@update')->name('update_employer');

//Enregistrement Conges /update / edit and delete
Route::get("/vuconge", "CongeController@vuconge")->name('vuconge');
Route::get("/createconge", "CongeController@createconge")->name('planifier_conge');
Route::post("Conges/createconge", "CongeController@store")->name('Conges');
//updateConges
Route::patch('updateconges/{id}/edit', 'CongeController@updateconges')->name('updateconges');
Route::get('vuconge/{id}/editconge',"CongeController@editconge")->name("edit_conge");
//======Supression Conge =========//
Route::delete('Conges/{id}',"CongeController@destroy");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//La supprission
Route::delete('personne/{id}',"PersonneController@destroy");
Route::get("/admin", function(){
	return view('admin');
});
////Departement ############################################################
///
Route::get("/adddepartment", "DepartmentController@adddepartment")->name('adddepartment');
Route::get("/vudepartment", "DepartmentController@vudepartmt")->name('vudptm');
Route::get('vudepartment/{id}/editdptm',"DepartmentController@editdptm")->name("edit_departement");
Route::post("department/adddepartment", "DepartmentController@storedpt")->name('adddepart');
Route::patch('update/{id}/editdptm', 'DepartmentController@update')->name('update_dpt');
Route::delete('department/{id}',"DepartmentController@destroy");
//etdi
Route::get('vudepartment/{id}/editdeptm',"DepartmentController@editdeptm")->name("edit_departemet");
Route::patch('update/{id}/editdeptm', 'DepartmentController@update')->name('update_departement');
///
//La partie Pointage############----############################################
//Ajoute du pointage
Route::get("/viewpointage","tallController@viewpointage")->name('affichagepointage');
Route::post("Pointage/viewpointage", "tallController@store")->name('pointage');
Route::patch('updatepointage/{id}/edit', 'tallController@updatepointage')->name('update_Pointage');
Route::get("/pointage", "tallController@pointage")->name('tablpointage');
//Suppression Pointage
Route::delete('Pointage/{id}',"tallController@destroy");
Route::get('pointage/{id}/edit',"tallController@edit")->name("edit_pointage");

// moderator Controller
  Route::get("/Superviseur", "ModeratorController@Moderator");
	Route::get("/employer", "ModeratorController@employer")->name('employer');
	Route::get("/conges", "ModeratorController@conges")->name("vudeconges");
	Route::get("/pointages", "ModeratorController@pointages")->name("vupointages");
	Route::get("/departement", "ModeratorController@departement")->name("dpt");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/deconnexion', 'CompteController@deconnexion');
Route::get('/expired', "AbonnementController@expired")->name('email');
Route::get("/pointer", "AjaxController@pointer");
Route::post("/pointer", "AjaxController@addpointage");
