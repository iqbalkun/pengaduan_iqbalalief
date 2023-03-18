<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('petugaz', function (Blueprint $table) {
            $table->id();
            $table->string('namaPetugas',35);
            $table->string('username',25);
            $table->string('password');
            $table->string('telp',13);
            $table->string('email');
            $table->enum('level',['admin','petugas']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            // $table->unsignedBigInteger('id_petugas');
            // $table->foreign('id_petugas')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
 
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugaz');
    }
};
