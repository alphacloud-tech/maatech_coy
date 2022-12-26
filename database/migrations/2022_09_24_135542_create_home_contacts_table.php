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
        Schema::create('home_contacts', function (Blueprint $table) {
            $table->id();

            $table->text('address');
            $table->string('email_1');
            $table->string('email_2');
            $table->string('phone_1');
            $table->string('phone_2');
            $table->string('phone_3');
            $table->string('phone_4');

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
        Schema::dropIfExists('home_contacts');
    }
};
