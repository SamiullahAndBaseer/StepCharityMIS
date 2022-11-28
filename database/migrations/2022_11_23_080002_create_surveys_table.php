<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('primary_phone_number')->unique();
            $table->string('whatsapp_number')->unique();
            $table->string('id_card_number');
            $table->boolean('gender')->nullable();
            $table->enum('marital_status', ['single', 'married'])->nullable();
            $table->datetime('date_of_birth')->nullable();
            $table->foreignId('branch_id');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('mosque_name');
            $table->text('description')->nullable();
            $table->string('original_location');
            $table->string('current_location');
            $table->text('question_one');
            $table->text('question_two');
            $table->text('question_three');
            $table->text('question_four');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId('course_id');
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
        Schema::dropIfExists('surveys');
    }
};
