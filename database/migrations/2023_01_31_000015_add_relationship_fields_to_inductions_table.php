<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInductionsTable extends Migration
{
    public function up()
    {
        Schema::table('inductions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7618595')->references('id')->on('users');
            $table->unsignedBigInteger('machine_id')->nullable();
            $table->foreign('machine_id', 'machine_fk_7618596')->references('id')->on('machines');
            $table->unsignedBigInteger('inducted_by_id')->nullable();
            $table->foreign('inducted_by_id', 'inducted_by_fk_7618598')->references('id')->on('users');
        });
    }
}
