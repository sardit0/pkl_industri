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
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_buku');
            $table->integer('jumlah');
            $table->string('nama');
            $table->date('tanggal_minjem');
            $table->date('batas_tanggal');
            $table->date('tanggal_kembali');
            $table->text('alasan')->nullable();
            $table->enum('status', ['ditahan', 'ditolak', 'diterima','dipinjam'])->default('ditahan');
            $table->timestamps();
        
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('bukus')->onDelete('cascade');
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