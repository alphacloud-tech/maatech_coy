<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_projects', function (Blueprint $table) {
            $table->id();

            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('client')->nullable();
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->string('project_icon')->nullable();
            $table->string('project_type')->nullable();
            $table->string('project_image')->nullable();

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
        Schema::dropIfExists('home_projects');
    }
};
