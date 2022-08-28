<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->string('created_by');
            $table->string('score');
            $table->string('status');
            $table->decimal('loan_amt', 9, 2);
            $table->string('loan_type');
            $table->string('interest_type');
            $table->integer('loan_tenure'); 
            $table->decimal('interest', 4, 2);
            $table->text('remark')->nullable();
            $table->decimal('origination_fee', 9, 2);
            $table->string('consultant_company')->nullable();
            $table->string('consultant_name')->nullable();
            $table->string('consultant_contact')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
