<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMateri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('classes_id');
            $table->string('name');
            $table->string('type');
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->string('reading')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('materi');
    }
}
