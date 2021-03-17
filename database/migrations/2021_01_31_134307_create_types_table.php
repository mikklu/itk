<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tyypit-taulun luonti tietokantaan
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });
    
        // Tyyppien asetus tietokantaan
        DB::table('types')->insert([
            ['type' => 'Mobiilisovellus'],
            ['type' => 'Peli'],
            ['type' => 'Tietokantasovellus'],
            ['type' => 'Verkkokauppa'],
            ['type' => 'Verkkosivusto'],
            ['type' => 'Muu'],
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
