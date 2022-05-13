<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nm_org')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}