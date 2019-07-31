<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->default('post_default.jpg');
            $table->text('body');
            $table->integer('view_count')->default(0);
            $table->boolean('status')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->datetime('is_completed_at')->nullable();
            $table->text('payment_method')->nullable();
            $table->datetime('payment_date')->nullable();
            $table->text('transaction_id')->nullable();
            $table->float('amount')->nullable();
            $table->float('earning')->nullable();
            $table->integer('assigned_to')->unsigned()->nullable();
            $table->datetime('assigned_date')->nullable();
            $table->datetime('deadline')->nullable();
            $table->datetime('reminder')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('assigned_to')
            ->references('id')->on('users')
            ->onDelete('cascade');    
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
        Schema::dropIfExists('posts');
    }
}
