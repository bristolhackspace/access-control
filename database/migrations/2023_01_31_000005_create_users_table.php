<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('standing_order')->nullable();
            $table->string('standing_order_name')->nullable();
            $table->boolean('direct_debit')->default(0)->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->boolean('welcome_email')->default(0)->nullable();
            $table->boolean('mailchimp')->default(0)->nullable();
            $table->string('discourse')->nullable();
            $table->longText('postal_address')->nullable();
            $table->date('membership_end_date')->nullable();
            $table->longText('notes')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }
}
