<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->json('site_contact')->nullable();
            $table->string('status_information')->nullable();
            $table->dateTime('last_update_user')->nullable();
            $table->string('icon')->nullable();
            $table->json('tagging')->nullable();
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
        Schema::dropIfExists('x_projects');
    }
}
