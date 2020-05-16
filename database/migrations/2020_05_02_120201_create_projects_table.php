<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();
            $table->string('entered_by',45);
            // $table->string('project_requirement',15);
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('job_role',45);
            $table->string('project_description',500);
            $table->string('number_of_staff',45);
            $table->string('rate_of_pay',45);
            $table->string('date',45);
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location',500);
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
        Schema::dropIfExists('projects');
    }
}
