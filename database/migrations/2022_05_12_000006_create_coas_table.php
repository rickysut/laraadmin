<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoasTable extends Migration
{
    public function up()
    {
        Schema::create('coas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('coa_code')->nullable();
            $table->string('coa_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}