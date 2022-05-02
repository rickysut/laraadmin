<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatkersTable extends Migration
{
    public function up()
    {
        Schema::create('satkers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_satker')->unique();
            $table->string('nm_satker');
            $table->integer('kd_kwn')->nullable();
            $table->string('kwn')->nullable();
            $table->string('tingkat')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
