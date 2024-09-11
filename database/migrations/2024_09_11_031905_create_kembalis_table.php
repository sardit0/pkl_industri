
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
            $table->unsignedBigInteger('id_minjem');
            $table->unsignedBigInteger('id_buku');

            $table->foreign('id_minjem')->references('id')->on('minjems')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('bukus')->onDelete('cascade');
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