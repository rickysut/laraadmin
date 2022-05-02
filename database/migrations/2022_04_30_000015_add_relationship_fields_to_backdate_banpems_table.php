<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBackdateBanpemsTable extends Migration
{
    public function up()
    {
        Schema::table('backdate_banpems', function (Blueprint $table) {
            $table->unsignedBigInteger('kd_akun_id')->nullable();
            $table->foreign('kd_akun_id', 'kd_akun_fk_6470613')->references('id')->on('akuns');
        });
    }
}
