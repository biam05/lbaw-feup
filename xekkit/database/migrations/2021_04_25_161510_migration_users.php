<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('username', 20)->unique();
            $table->text('email')->unique();
            $table->text('password')->unique();
            $table->text('password')->unique();
            $table->text('password')->unique();
            $table->text('password')->unique();
            $table->text('password')->unique();
            $table->text('password')->unique();
            $table->text('password')->unique();
            $table->text('password')->unique();
            $table->boolean('is_moderator');
            $table->boolean('is_partner');
            $table->boolean('is_banned');
            $table->boolean('is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
