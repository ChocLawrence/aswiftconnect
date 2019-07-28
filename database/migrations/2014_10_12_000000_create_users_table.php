<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->default('none');
            $table->string('specialty')->default('none');
            $table->integer('resume')->default('none');
            $table->string('password');
            $table->string('image')->default('default.png');
            $table->text('about')->nullable();
            $table->string('country')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('github_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->integer('status')->nullable();
            $table->integer('is_accepted')->nullable();
            $table->date('vet_date')->nullable();
            $table->time('vet_time')->nullable();
            $table->text('vet_url')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
