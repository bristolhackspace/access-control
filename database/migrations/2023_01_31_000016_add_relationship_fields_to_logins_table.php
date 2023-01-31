<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLoginsTable extends Migration
{
    public function up()
    {
        Schema::table('logins', function (Blueprint $table) {
            $table->unsignedBigInteger('machine_id')->nullable();
            $table->foreign('machine_id', 'machine_fk_7621352')->references('id')->on('machines');
            $table->unsignedBigInteger('card_id')->nullable();
            $table->foreign('card_id', 'card_fk_7621353')->references('id')->on('cards');
        });
    }
}
