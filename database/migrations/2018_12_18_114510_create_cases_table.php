<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caseid');
            $table->string('client_name');
            $table->string('client_id');
            $table->string('client_email');
            $table->string('client_phonenumber');
            $table->string('client_package');
            $table->string('case_status');
            $table->string('sub_status');
            $table->string('doctor_id');
            $table->text('content');
            $table->foreign('client_email')
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
        Schema::dropIfExists('cases');
    }
}
