<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKecamatansTable extends Migration
{
    public function up()
    {
        Schema::table('kecamatans', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_kab_id')->nullable();
            $table->foreign('kd_kab_id', 'kd_kab_fk_6477212')->references('id')->on('kabupatens');
        });
    }
}
