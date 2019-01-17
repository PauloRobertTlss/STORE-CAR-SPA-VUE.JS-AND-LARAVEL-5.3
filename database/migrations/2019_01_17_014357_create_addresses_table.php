<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAddressesTable.
 */
class CreateAddressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('route',60)->nullable();
            $table->integer('number')->nullable();
            $table->string('neighborhood',30)->nullable();
            $table->string('city',30)->nullable();
            $table->string('state',4)->nullable();
            $table->string('complement',30)->nullable();
            $table->string('reference_point',40)->nullable();
            $table->string('postcode',10)->nullable();
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
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
		Schema::drop('addresses');
	}
}
