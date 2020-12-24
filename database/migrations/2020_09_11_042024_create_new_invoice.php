<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_new_invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('inv_number');
            $table->date('invoice_date');
            $table->date('issue_data');
            $table->string('payment_terms');
            $table->string('notes')->nullable();
            $table->string('notes_raw')->nullable();
            $table->string('total');
            $table->boolean('status');
            $table->date('paid_date')->nullable();
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
        Schema::dropIfExists('new_invoice');
    }
}
