<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounselingResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counseling_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students');
            $table->text('description')->nullable();
            $table->longText('remarks')->nullable();
            $table->integer('encoded_by')->unsigned();
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
        Schema::dropIfExists('counseling_results');
    }
}
