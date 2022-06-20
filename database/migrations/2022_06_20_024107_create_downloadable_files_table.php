<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadableFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloadable_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students');
            $table->enum('file_type', ['recomendation_letter', 'others']);
            $table->longText('file_location');
            $table->integer('uploaded_by')->unsigned();
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
        Schema::dropIfExists('downloadable_files');
    }
}
