<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ideat-taulun luonti tietokantaan
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('type_id')->constrained('types')->onUpdate('cascade');
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->foreignId('client_id')->nullable()->constrained('contacts')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('instructor_id')->nullable()->constrained('contacts')->onUpdate('cascade')->onDelete('set null');
            $table->boolean('is_urgent')->default(false);
            $table->foreignId('phase_id')->constrained('phases')->onUpdate('cascade');
            $table->string('deadline')->nullable();
            $table->string('completed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideas');
    }
}
