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
        Schema::create('qurban_savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->boolean('is_accept');
            $table->string('qurban');
            $table->string('qurban_type');
            $table->string('instalment');
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
        Schema::dropIfExists('qurban_savings');
    }
};
