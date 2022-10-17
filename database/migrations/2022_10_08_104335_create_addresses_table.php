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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('country');
            $table->string('region');
            $table->string('city')->nullable();
            $table->string('parish')->nullable();
            $table->string('village')->nullable();
            $table->string('house_name')->nullable();
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('flat_number')->nullable();
            $table->string('postcode');
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
        Schema::dropIfExists('addresses');
    }
};
