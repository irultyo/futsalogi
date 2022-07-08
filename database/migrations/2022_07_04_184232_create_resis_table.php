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
        Schema::create('resis', function (Blueprint $table) {
            $table->id();
            $table->string('resi');
            $table->string('penerima');
            $table->string('pengirim');
            $table->string('alamatPengirim');
            $table->string('alamatPenerima');
            $table->string('layanan');
            $table->string('status');
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
        Schema::dropIfExists('resis');
    }
};
