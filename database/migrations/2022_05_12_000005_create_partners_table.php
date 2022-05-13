<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('partner_type');
            $table->integer('partner_code');
            $table->string('partner_name');
            $table->longText('partner_address')->nullable();
            $table->string('partner_email')->nullable();
            $table->string('partner_phone')->nullable();
            $table->string('partner_pic')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}