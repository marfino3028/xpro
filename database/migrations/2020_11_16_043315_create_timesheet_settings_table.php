<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_timesheet_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->boolean('enable_penalty')->default(true);
            $table->integer('normal_hours')->nullable();
            $table->float('penalty_rates_1')->nullable();
            $table->integer('max_hours_penalty_1')->default(2);
            $table->float('penalty_rates_2')->nullable();
            $table->integer('max_hours_penalty_2')->default(4);
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
        Schema::dropIfExists('x_timesheet_settings');
    }
}
