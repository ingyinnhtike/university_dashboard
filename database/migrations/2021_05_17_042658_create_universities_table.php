<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_mm');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('township_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('user_id');
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('image');
            $table->text('website');
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
        Schema::dropIfExists('universities');
    }
}
