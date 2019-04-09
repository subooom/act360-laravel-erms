<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('employees', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('dob');
        $table->string('gender');
        $table->string('mobile_number');
        $table->string('address');
        $table->string('photo');
        $table->string('current_salary');
        $table->string('join_date');
        $table->string('about');
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
      Schema::dropIfExists('employees');
    }
}
