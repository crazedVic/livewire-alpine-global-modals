<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('rate')->nullable();
            $table->string('rate_frequency')->default('hour');
            $table->string('rate_currency')->default('CAD$');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('platform')->default("None");
            $table->string('platform_profile')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('consultants');
    }
}
