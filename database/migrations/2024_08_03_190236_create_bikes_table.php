<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_url');
            $table->decimal('rate_per_hour', 10, 2);
            $table->integer('cc');
            $table->decimal('weight', 10, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bikes');
    }
}