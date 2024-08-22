<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->integer('role_id')->default(3); // Default role_id value is 3
        });
    }

    /**
     * Reverse the migrations.
     */
   
     public function down()
     {
         Schema::table('user', function (Blueprint $table) {
             $table->dropColumn('role_id');
         });
     }
};
