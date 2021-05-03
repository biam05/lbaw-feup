<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->text('password');
            $table->text('description');
            $table->text('photo')->unique();
            $table->date('birthdate');
            $table->enum('gender', ['m', 'f', 'n']);
            $table->integer('reputation')->default(0);
            $table->date('last_day_of_vote')->nullable();
            $table->integer('count_last_day_rep')->default(0)->nullable();
            $table->boolean('is_moderator')->default(false);
            $table->boolean('is_partner')->default(false);
            $table->boolean('is_banned')->default(false);
            $table->boolean('is_deleted')->default(false);
        });

        DB::statement('ALTER TABLE users ADD CONSTRAINT chkreputation CHECK (reputation > 0);');
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
