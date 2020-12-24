<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_receive_payment', function (Blueprint $table) {
            //
            $table->integer('user_id')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('type_account')->nullable();
            $table->string('invoice_id')->nullable();
            $table->dateTime('received_at')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('x_receive_payment');
    }
}
