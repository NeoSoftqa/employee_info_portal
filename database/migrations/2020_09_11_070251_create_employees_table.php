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
            $table->integer('user_id')->nullable();
            $table->string('neo_employee_id')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->date('dob')->nullable();
            $table->string('department')->nullable();
            $table->string('technology')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('office_location')->nullable();
            $table->string('home_location')->nullable();
            $table->string('office_mail_id')->unique();
            $table->string('personal_mail_id')->unique();
            $table->string('skype_id')->nullable();
            $table->enum('passport_available', ['yes', 'no']);

            $table->string('degree')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('specialization')->nullable();

            $table->string('certification')->nullable();
            $table->string('total_exp')->nullable();
            $table->string('prev_exp')->nullable();
            $table->string('designation')->nullable();
            $table->string('team_lead')->nullable();
            $table->enum('interview_availability', ['yes', 'no']);
            
            $table->string('salary_cadre')->nullable();
            $table->date('on_bench_since')->nullable();

            $table->longText('work_history')->nullable();
            $table->longText('interview_history')->nullable();
            

            $table->date('joining_date')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
