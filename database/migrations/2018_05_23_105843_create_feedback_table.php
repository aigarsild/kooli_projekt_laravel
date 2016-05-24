<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();

            $table->string('personal_tags');
            $table->string('professional_tags');
            $table->string('rate_person');
            $table->string('rate_profession');
            $table->longText('worker_description');
            $table->longText('personal_description');
            $table->longText('professional_feedback');
            $table->longText('personal_feedback');
            $table->boolean('sociable');
            $table->boolean('creepy');
            $table->boolean('awesome');
            $table->timestamps();
        });

        Schema::table('feedback', function ($table) {
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('feedback');
    }
}
