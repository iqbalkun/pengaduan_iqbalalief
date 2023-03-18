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
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengaduan');
            $table->foreign('id_pengaduan')->references('id')->on('pengaduan')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_tanggapan');
            $table->text('tanggapan');
            $table->unsignedBigInteger('id_petugaz');
            $table->foreign('id_petugaz')->references('id')->on('petugaz')->onUpdate('cascade')->onDelete('cascade');

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggapans');
    }
};
