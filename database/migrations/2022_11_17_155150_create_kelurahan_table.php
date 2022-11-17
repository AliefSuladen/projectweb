<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->id('id_kelurahan', 100);
            $table->string('nama', 100);
            $table->string('luas', 100);
            $table->string('jml_penduduk', 100);
            $table->string('kepadatan', 100);
            $table->string('kdpos', 100);
            $table->string('kdmendagri', 100);
            $table->string('alamat', 100);
            $table->longText('isi');
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
        Schema::dropIfExists('kelurahan');
    }
}
