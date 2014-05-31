<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('map_files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('map_id')->nullable()->unsigned()->index();
			$table->foreign('map_id')->references('id')->on('maps')->onUpdate('cascade')->onDelete('cascade');

			$table->string('filename');
			$table->string('filesize');
			$table->string('filetype');
			$table->text('s3_path');
			
			$table->softDeletes();
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
		Schema::drop('map_files');
	}

}
