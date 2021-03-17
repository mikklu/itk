<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Toteutusvaiheet-taulun luonti tietokantaan
        Schema::create('phases', function (Blueprint $table) {
            $table->id();
            $table->string('phase');
        });

        // Toteutusvaiheiden asetus tietokantaan
        DB::table('phases')->insert([
            ['phase' => 'Idea'],
            ['phase' => 'Toteutuksessa'],
            ['phase' => 'Keskeytynyt'],
            ['phase' => 'Valmis'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phases');
    }
}
