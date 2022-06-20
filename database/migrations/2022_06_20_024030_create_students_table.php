<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('student_id', 20);
            $table->string('gender', 10);
            $table->date('birth_day');
            $table->longText('address');
            $table->string('picture', 200);
            $table->string('civil_status', 20);
            $table->string('religion', 20);
            $table->string('contact_number', 20)->nullable();
            $table->string('email_address', 20)->nullable();
            $table->string('guardian_name', 100);
            $table->string('relationship', 50);
            $table->string('guardian_contact_number', 20);
            $table->longText('remarks')->nullable();
           $table->integer('added_by')->unsigned();
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
        Schema::dropIfExists('students');
    }
}
