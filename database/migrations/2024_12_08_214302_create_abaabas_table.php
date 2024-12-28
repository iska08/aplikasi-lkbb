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
        Schema::create('abaabas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->constrained()->cascadeOnDelete();
            $table->string('nama_abaaba');
            $table->integer('urutan_abaaba');
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
        Schema::dropIfExists('abaabas');
    }
};
