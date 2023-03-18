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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengaduan');
            $table->enum('jenis_pengaduan',['jalan','bantuan','kemacetan','bencana','dana']);
            // a
            $table->char('nik');
            // $table->foreign('nik')->references('nik')->on('masyarakat')->onUpdate('cascade')->onDelete('cascade');
            $table->text('isi_laporan');
            $table->string('foto',255);
            $table->enum('status', ['0','proses','selesai']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
};
