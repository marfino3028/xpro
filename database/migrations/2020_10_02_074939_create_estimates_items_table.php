<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_estimates_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estimates_id');
            $table->integer('product_id')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('x_estimates_items');
    }
}
