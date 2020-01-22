<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    public function personne()
    {
        return $this->belongsTo('App\personne');
    }
}
