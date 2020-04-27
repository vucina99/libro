<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProizvodivelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proizvodivels', function (Blueprint $table) {
            $table->id();
            $table->string("naziv");
            $table->string("sifra");
            $table->longText("opis");
            $table->string("slika");
            $table->integer("vrsta_id");
            $table->integer("cena_jedan");
            $table->integer("cena_paket");
            $table->integer("cena_jedan_sniz")->nullable();
            $table->integer("cena_paket_sniz")->nullable();
            $table->integer("kategorija_id");
            $table->integer("podkategorija_id");
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
        Schema::dropIfExists('proizvodivels');
    }
}
