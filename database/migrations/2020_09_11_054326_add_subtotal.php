<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubtotal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('x_new_invoice', function (Blueprint $table) {
            $table->integer('qty')->after('notes_raw')->default(0);
            $table->integer('amount')->after('qty')->default(0);
            $table->double('subtotal')->after('amount')->default(0);
            $table->unsignedBigInteger('id_tax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('x_new_invoice', function (Blueprint $table) {
            //
        });
    }
}
