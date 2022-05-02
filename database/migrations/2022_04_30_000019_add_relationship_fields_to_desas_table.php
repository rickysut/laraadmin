<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDesasTable extends Migration
{
    public function up()
    {
        Schema::table('desas', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_kec_id')->nullable();
            $table->foreign('kd_kec_id', 'kd_kec_fk_6477226')->references('id')->on('kecamatans');
        });
    }
}
