<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abaaba_id')->constrained()->cascadeOnDelete();
            $table->integer('skala1');
            $table->integer('skala2');
            $table->integer('skala3');
            $table->integer('skala4');
            $table->integer('skala5');
            $table->integer('skala6');
            $table->integer('skala7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaians');
    }
};
