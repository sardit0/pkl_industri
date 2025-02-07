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
        Schema::table('minjems', function (Blueprint $table) {
            $table->integer('denda')->default(0)->after('tanggal_kembali');
        });
    }
    
    public function down()
    {
        Schema::table('minjems', function (Blueprint $table) {
            $table->dropColumn('denda');
        });
    }
};
