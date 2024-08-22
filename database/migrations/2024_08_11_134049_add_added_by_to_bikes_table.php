<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bikes', function (Blueprint $table) {
            $table->unsignedBigInteger('added_by'); // Add the new column
        });
    }
    
    public function down()
    {
        Schema::table('bikes', function (Blueprint $table) {
            $table->dropColumn('added_by'); // Remove the column if rolling back
        });
    }
    
};
