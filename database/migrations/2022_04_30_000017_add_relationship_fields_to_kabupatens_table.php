<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKabupatensTable extends Migration
{
    public function up()
    {
        Schema::table('kabupatens', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_prop_id')->nullable();
            $table->foreign('kd_prop_id', 'kd_prop_fk_6477198')->references('id')->on('provinsis');
        });
    }
}
