<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('user_name', 50);
            $table->longText('password');
            $table->string('salt', 200)->nullable();
            $table->string('email', 100)->nullable();
            $table->boolean('user_level');
            $table->string('created_by', 40);
            $table->timestamps();
        });

        // Insert default admin
        DB::table('users')->insert(
            array(
                'last_name' => 'Admin',
                'first_name' => 'Super',
                'user_name' => 'gssadmin',
                'password' => md5('admin1234'),
                'user_level' => 1,
                'created_by' => 'default'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
