<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('about_company')->nullable();
            $table->string('about_lifestyle')->nullable();
            $table->string('about_coaching')->nullable();
            $table->text('noticed')->nullable();
            $table->text('feedback')->nullable();
            $table->text('etc')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}
