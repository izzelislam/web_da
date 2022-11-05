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
        Schema::create('ortus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('father_name');
            $table->string('father_nik');
            $table->string('father_birth_date');
            $table->string('father_place_birth');
            $table->string('father_profession');
            $table->string('father_last_education');
            $table->string('father_income');
            $table->string('mother_name');
            $table->string('mother_nik');
            $table->string('mother_birth_date');
            $table->string('mother_place_birth');
            $table->string('mother_profession');
            $table->string('mother_last_education');
            $table->string('mother_income');
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
        Schema::dropIfExists('ortus');
    }
};
