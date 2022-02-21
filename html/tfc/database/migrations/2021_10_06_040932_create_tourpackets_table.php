<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourpackages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('summary')->nullable();
            $table->string('continent')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->bigInteger('id_categroy')->nullable();
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourpackages');
    }
}
