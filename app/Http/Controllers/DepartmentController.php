<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\department;
use Illuminate\Paginattion\Paginator;

class DepartmentController extends Controller
{
    public function adddepartment()
    {
    	$this->authorize('admin');
      return view('department.adddepartment');
    }
    public function vudepartmt()
    {
        $this->authorize('admin');
        $deptmt = department::all();
        $deptmt = department::orderBy('created_at','DESC')->paginate(5);
        return view('department.vudepartment', compact('deptmt'));
    }
    public function storedpt(Request $request)
    {
    	$this->authorize('admin');
        $verifi_dpt = $request->validate(['nom_departemet'=>'required']);
        $dpt = new \App\department();
        $dpt->nom_departemet = Request('nom_departemet');
        $dpt->save();
        return redirect()->route('vudptm')->with(['success' => "l'enregistrement a ete bien effectuée"]);
    }
    public function editdeptm($id)
    {
    	$this->authorize('admin');
        $depart = \App\department::find($id);//on recupere l'employer
        return view('personne.edit', compact('depart'));
    }
    public function editdptm($id)
    {
        $this->authorize('admin');
        $departement = \App\department::find($id);//on recupere l'employer
        return view('department.editdptm',compact('departement'));
    }
    public function update(Request $request, $id)
    {
    	$this->authorize('admin');
        $dpt = \App\department::find($id);
        if($dpt){
            $dpt->nom_departemet = $request->input('nom_departemet');
            $dpt->save();
        }

        return redirect()->route('vudptm')->with(['success' => "les modifications ont ete bien effectuées"]);

    }
    //partie suppression
    public function destroy($id)
    {
    	$this->authorize('admin');
        $sup = \App\department::find($id);
        if($sup)
            $sup->delete();
        return redirect()->route('vudptm')->with(['success' => "Suppession reuissi"]);
    }

}
