<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVupointagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      \DB::statement("
            CREATE VIEW vupointages
            AS
          SELECT
         tallies.datejr,
         personnes.id,
         personnes.nom,
         personnes.prenom,
         personnes.matricule,
         tallies.heure_arrive,
         tallies.heure_sorti,
         tallies.absence,
         tallies.motif,
         departments.nom_departemet
   FROM
         personnes,tallies,departments
   WHERE
         personnes.id=tallies.personne_id and personnes.department_id = departments.id;
");
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vupointages');
    }
}
