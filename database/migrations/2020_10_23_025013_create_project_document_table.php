<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_projects_document', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->nullable();
            $table->string('original_name')->nullable();
            $table->string('name')->nullable();
            $table->string('url_file')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('path_file')->nullable();
            $table->string('size_file')->nullable();
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
        Schema::dropIfExists('x_projects_document');
    }
}
