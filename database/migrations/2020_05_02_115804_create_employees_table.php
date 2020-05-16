<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('email_address',191);
            $table->string('first_name',45);
            $table->string('last_name',45);
            $table->string('phone_number',30);
            $table->date('date_of_birth');
            $table->string('nationality',45);
            $table->string('pps_number',45);
            $table->string('passport_number',45);
            $table->string('visa_status',45);
            $table->date('visa_expire');
            $table->string('manual_hand');
            $table->date('manual_exp');
            $table->string('full_available');
            $table->string('job_role',45);
            $table->integer('min_pay');
            $table->string('banned',10);
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
