<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProvinsisTable extends Migration
{
    public function up()
    {
        Schema::table('provinsis', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_satker_id')->nullable();
            $table->foreign('kd_satker_id', 'kd_satker_fk_6517966')->references('id')->on('satkers');
        });
    }
}
