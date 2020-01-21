<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \App\dossier;


class FilleController extends Controller
{
    public function created()
    {
      return view('upload.created');
    }

public function store(Request $request)
{
$request->validate([
"name"=>"required|max:300|min:5",
"filename" => 'nullable | image | mimes:jpeg,png,jpg,gif,pdf,doc | max: 2048'
]);
$produit = new dossier();
//On verfie si une image est envoyée
if($request->has('filename')){
//On enregistre l'image dans un dossier
$image = $request->file('filename');
//Nous allons definir le nom de notre image en combinant le nom du produit et untimestamp
$image_name = Str::slug($request->input('name')).'_'.time();
//Nous enregistrerons nos fichiers dans /uploads/images dans public
$folder = '/uploads/images/';
//Nous allons enregistrer le chemin complet de l'image dans la BD
$produit->images = $folder.$image_name.'.'.$image->getClientOriginalExtension();
//Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la methode
uploadImage();
$this->uploadImage($image, $folder, 'public', $image_name);
}
$produit->titre = $request->input('name');
$produit->file = $request->input('filename');
$produit->save();
return redirect(route('upload.created'));
}
public function uploadImage(UploadedFile $uploadedFile, $folder =
null, $disk = 'public', $filename = null){
$name = !is_null($filename) ? $filename : str_random('25');
$file = $uploadedFile->storeAs($folder,
$name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
return $file;
}
public function information()
{
  $products = \App\dossier::orderBy('created_at', 'DESC')->get();
  return view('upload.information',compact('products'));
}

}
