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
        Schema::create('kembalis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jumlah');
            $table->date('tanggal_kembali');
            $table->string('status');
            $table->decimal('denda', 10, 2)->default(0);
            $table->unsignedBigInteger('id_minjem');
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_user'); // Menambahkan kolom id_user

            $table->foreign('id_minjem')->references('id')->on('minjems')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); // Menambahkan foreign key untuk id_user
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
        Schema::dropIfExists('kembalis');
    }
};
