<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order')->unique();
            $table->decimal('total_cost', 15, 2)->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
