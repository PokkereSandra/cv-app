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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('level');
            $table->string('university')->nullable();
            $table->string('faculty')->nullable();
            $table->string('study_direction')->nullable();
            $table->integer('study_status')->nullable();
            $table->date('started_at')->nullable();
            $table->date('finished_at')->nullable();
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
        Schema::dropIfExists('educations');
    }
};
