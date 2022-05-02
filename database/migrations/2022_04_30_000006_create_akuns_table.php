<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunsTable extends Migration
{
    public function up()
    {
        Schema::create('akuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kd_akun')->unique();
            $table->string('nama_akun');
            $table->string('status');
            $table->string('pendekatan');
            $table->string('jenis');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
