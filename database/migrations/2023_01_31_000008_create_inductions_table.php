<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInductionsTable extends Migration
{
    public function up()
    {
        Schema::create('inductions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('inductor')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
