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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pesanan');
            $table->date('tanggal_main');
            $table->integer('lama_sewa');
            $table->integer('status');
            $table->foreignId('lapangan_id')->constrained('lapangans');
            $table->foreignId('jam_id')->constrained('jams');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('invoice_reservasi_id')->constrained('invoice_reservasis'); 
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
        Schema::dropIfExists('reservasis');
    }
};
