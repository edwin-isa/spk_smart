<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangeNilaiTable extends Migration
{
    public function up()
    {
        Schema::create('range_nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_kriteria_id');
            $table->string('range');
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriteria')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('range_nilai');
    }
}