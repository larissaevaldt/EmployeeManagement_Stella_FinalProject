<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeWorkingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_working_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->time('mondayStart');
            $table->time('tuesdayStart');
            $table->time('wednesdayStart');
            $table->time('thursdayStart');
            $table->time('fridayStart');
            $table->time('saturdayStart');
            $table->time('sundayStart');
            $table->time('mondayLast');
            $table->time('tuesdayLast');
            $table->time('wednesdayLast');
            $table->time('thursdayLast');
            $table->time('fridayLast');
            $table->time('saturdayLast');
            $table->time('sundayLast');
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
        Schema::dropIfExists('employee_working_times');
    }
}
