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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('phone_number');
            $table->string('id_card_number');
            $table->decimal('salary')->default(0);
            $table->text('bio');
            $table->integer('gender');
            $table->integer('marital_status')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('status')->default(1);
            $table->date('join_date')->nullable();
            $table->foreignId('role_id');
            $table->foreignId('branch_id')->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->string('email')->unique();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // $table->string('name');
            // $table->foreignId('current_team_id')->nullable();
        });
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
};
