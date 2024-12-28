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
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_pendaftaran_buka');
            $table->string('tgl_pendaftaran_tutup');
            $table->string('lokasi_pendaftaran');
            $table->string('tgl_tm');
            $table->string('lokasi_tm');
            $table->string('tgl_pelaksanaan');
            $table->string('lokasi_pelaksanaan');
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
        Schema::dropIfExists('timelines');
    }
};
