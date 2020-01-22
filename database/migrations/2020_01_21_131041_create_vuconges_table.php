<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVucongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      \DB::statement("
            CREATE VIEW vuconges
            AS
          SELECT
         personnes.id,
         personnes.nom,
         personnes.prenom,
         personnes.matricule,
         conges.date_debut,
         conges.date_fin,
         conges.motif,
         departments.nom_departemet
   FROM
         personnes,conges,departments
   WHERE
         personnes.id = conges.personne_id and personnes.department_id = departments.id;
");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuconges');
    }
}
