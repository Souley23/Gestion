<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personne;

class PersonneController extends Controller
{
    public function create()
    {
        $depperso= \App\department::pluck('nom_departemet','id');
        return view('personne.create',compact('depperso'));
    }

    public function store(Request $request)
    {
      $verifi_ajout = $request->validate(['nom'=>'required', 'prenom'=>'required','matricule'=>'required','statut'=>'required',
          'email'=>'email','telephone'=>'required|max:19','adresse'=>'required']);
      $persone = new \App\Personne();
        $persone->nom = Request('nom');
        $persone->prenom = Request('prenom');
        $persone->matricule = Request('matricule');
        $persone->fonction= Request('fonction');
        $persone->statut= Request('statut');
        $persone->email= Request('email');
        $persone->telephone= Request('telephone');
        $persone->adresse= Request('adresse');
        $persone->department_id= Request('department_id');
        $persone->save();
        return redirect()->route('acceuil')->with(['success' => "l'enregistrement a ete bien effectuée"]);

    }

    public function edit($id)
    {
        $pers = \App\Personne::find($id);//on recupere l'employer
        return view('personne.edit', compact('pers'));
    }
    public function update(Request $request, $id){
        $pers = \App\Personne::find($id);
        if($pers){
            $pers->nom       = $request->input('nom');
            $pers->prenom    = $request->input('prenom');
            $pers->matricule = $request->input('matricule');
            $pers->fonction    = $request->input('fonction');
            $pers->statut    = $request->input('statut');
            $pers->email     = $request->input('email');
            $pers->telephone = $request->input('telephone');
            $pers->adresse   = $request->input('adresse');
            $pers->save();
        }

        return redirect()->route('acceuil')->with(['success' => "les modifications ont ete bien effectuées"]);

    }

}
