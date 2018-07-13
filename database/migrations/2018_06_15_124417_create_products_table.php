<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('price');
			$table->string('category');
			$table->string('tva')->nullable();
			$table->string('unit')->nullable();
			$table->integer('weight')->nullable();
			$table->integer('convertedPrix')->nullable();
			$table->string('labels')->nullable();
			$table->string('tags')->nullable();
			$table->string('origin')->nullable();
			$table->string('desc')->nullable();
			$table->integer('prix_ht')->nullable();
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
		Schema::dropIfExists('products');
	}

}
