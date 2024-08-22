<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2); // Amount column
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_requests');
    }
}
