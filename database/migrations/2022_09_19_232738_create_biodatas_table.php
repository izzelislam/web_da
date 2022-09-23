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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('fullname');
            $table->string('name');
            $table->string('brth_date');
            $table->string('brth_place');
            $table->string('order_of_birth');
            $table->string('language');
            $table->string('address');
            $table->string('rt_rw');
            $table->string('village');
            $table->string('district');
            $table->string('regency');
            $table->string('province');
            $table->string('height');
            $table->string('weight');
            $table->boolean('vision');
            $table->boolean('hearing');
            $table->string('disease_present');
            $table->string('disease_once');
            $table->string('prev_school');
            $table->string('moved_school')->nullable();
            $table->string('learn_duration')->nullable();
            $table->string('accepted_at')->nullable();
            $table->text('moved_reason')->nullable();
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
        Schema::dropIfExists('biodatas');
    }
};
