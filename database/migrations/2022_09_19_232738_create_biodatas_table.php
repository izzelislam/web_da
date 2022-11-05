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
            $table->string('hoby');
            $table->string('goals');
            $table->string('brth_date');
            $table->string('brth_place');
            $table->string('nisn');
            $table->string('no_akta');
            $table->string('brothers');
            $table->string('order_of_birth');
            $table->string('address');
            $table->string('rt');
            $table->string('rw');
            $table->string('village');
            $table->foreignId('district_id');
            $table->foreignId('regency_id');
            $table->foreignId('province_id');
            $table->string('postal_code');
            $table->string('language');
            $table->string('cloth_size');
            $table->string('no_wali');
            $table->string('height');
            $table->string('weight');
            $table->string('blood');
            $table->boolean('vision');
            $table->string('minus')->nullable();
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
