<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\personne;
use App\tally;
use \App\department;
use App\Vuconge;
use App\vupointage;
use Illuminate\Paginattion\Paginator;

class ModeratorController extends Controller
{
    public function Moderator()
    {
        return view('Moderator');
    }
    public function employer()
    {
    	$persos = Personne::all();
    	 $persos = Personne::orderBy('created_at','DESC')->paginate(5);
        return view('moderator.employer', compact('persos'));
    }
    public function conges()
    {
    	$conge = Vuconge::all();
    	$conge = Vuconge::orderBy('nom','DESC')->paginate(5);
        return view('moderator.conges',compact('conge'));
    }
     public function pointages()
     {
     	$pointer = vupointage::all();
     	$pointer = vupointage::orderBy('datejr','DESC')->paginate(5);
        return view('moderator.pointages',compact('pointer'));
    }
     public function departement()
     {
     	$deptmt = department::all();
     	$deptmt = department::orderBy('created_at','DESC')->paginate(5);
        return view('moderator.departement',compact('deptmt'));
    }
}
