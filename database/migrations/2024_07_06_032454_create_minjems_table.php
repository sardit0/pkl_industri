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
        Schema::create('minjems', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah');
            $table->date('tanggal_minjem');
            $table->date('tanggal_kembali');
            $table->string('nama');
            $table->string('status');
            $table->unsignedBigInteger('id_buku');
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
        Schema::dropIfExists('minjems');
    }
};
