<?php

use Illuminate\Database\Migrations\Migration;

class CreateFaqs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($table){
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('email')->unique();
            $table->string('name');

            $table->timestamps();
        });

		Schema::create('questions', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->text('question');
            $table->integer('user_id')->unsigned();
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });

		Schema::create('answers', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->text('answer');
            $table->boolean('accepted')->default(0);
            $table->integer('question_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);

            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('user_id')->references('id')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
		Schema::drop('answers');
		Schema::drop('users');
	}

}