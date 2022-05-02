<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjasTable extends Migration
{
    public function up()
    {
        Schema::create('belanjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun');
            $table->string('kewenangan');
            $table->decimal('pagu', 15, 2);
            $table->decimal('realisasi', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
