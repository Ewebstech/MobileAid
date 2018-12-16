<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('email');
            $table->string('status');
            $table->string('package');
            $table->string('amount');
            $table->string('currency');
            $table->string('transref')->unique();
            $table->text('content');
            $table->foreign('email')
                  ->references('email')
                  ->on('users')
                  ->onDelete('Cascade');
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
        Schema::dropIfExists('transactions');
    }
}
