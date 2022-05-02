<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatensTable extends Migration
{
    public function up()
    {
        Schema::create('kabupatens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kd_kab')->unique();
            $table->string('nama_kab');
            $table->float('lat', 13, 10)->nullable();
            $table->float('lng', 13, 10)->nullable();
            $table->integer('tz')->nullable();
            $table->string('path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
