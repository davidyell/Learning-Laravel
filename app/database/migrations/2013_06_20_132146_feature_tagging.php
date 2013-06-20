<?php

use Illuminate\Database\Migrations\Migration;

class FeatureTagging extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name');
            $table->string('slug');

            $table->timestamps();
        });

        Schema::create('question_tag', function($table) {
            $table->engine = 'InnoDB';

            $table->integer('question_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tags');
		Schema::drop('question_tag');
	}

}