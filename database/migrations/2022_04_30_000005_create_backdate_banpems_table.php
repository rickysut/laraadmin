<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdateBanpemsTable extends Migration
{
    public function up()
    {
        Schema::create('backdate_banpems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year')->nullable();
            $table->decimal('nom_pagu', 15, 2);
            $table->decimal('nom_realisasi', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
