<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCoasTable extends Migration
{
    public function up()
    {
        Schema::table('coas', function (Blueprint $table) {
            $table->unsignedBigInteger('coa_parent_id')->nullable();
            $table->foreign('coa_parent_id', 'coa_parent_fk_6533217')->references('id')->on('coas');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6533174')->references('id')->on('users');
        });
    }
}