<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_invoice_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->boolean('disable_invoice_item_edit')->default(false);
            $table->boolean('disable_estimates_module')->default(false);
            $table->boolean('enable_invoice_manual_status')->default(false);
            $table->boolean('disable_shipping_option')->default(false);
            $table->boolean('enable_maximum_discount')->default(false);
            $table->boolean('disable_footer')->default(false);
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
        Schema::dropIfExists('x_invoice_setting');
    }
}
