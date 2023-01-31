<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->unique();
            $table->string('rfid')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('paid_for')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
