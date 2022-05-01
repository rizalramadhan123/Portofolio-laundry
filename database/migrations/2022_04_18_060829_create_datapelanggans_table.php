<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapelanggans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_pelanggan');
            $table->string('no_telp');
            $table->float('berat_barang');
            $table->integer('hargaperkilo');
            $table->integer('total');
            $table->integer('uang');
            $table->double('kembalian');
            $table->foreignId('id_user');
            $table->foreignId('id_detergen');
            $table->boolean('statuscucian')->dafault(false);
            $table->boolean('statusbayar')->dafault(false);
            $table->boolean('statusambil')->dafault(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapelanggans');
    }
}
