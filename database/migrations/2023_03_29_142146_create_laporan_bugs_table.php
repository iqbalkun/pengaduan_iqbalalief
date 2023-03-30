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
        Schema::create('laporan_bug', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis',['funcional_errorr', 'performance_defects', 'usability_defects', 'compatibility_erorr', 'security_erorr', 'syntax_erorr', 'logic_erorr']);
            $table->string('deskripsi');
            $table->date('tgl_kejadian');
            $table->string('pelapor');
            $table->enum('status',['reported', 'on_progres', 'solved']);
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
        Schema::dropIfExists('laporan_bug');
    }
};
