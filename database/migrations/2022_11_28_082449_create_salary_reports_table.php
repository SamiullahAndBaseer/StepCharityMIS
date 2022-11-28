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
        Schema::create('salary_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->decimal('salary');
            $table->integer('present_days')->default(0);
            $table->integer('leave_days')->default(0);
            $table->integer('tip')->default(0);
            $table->text('description');
            $table->enum('status', ['Paid', 'Pay'])->default('Pay');
            $table->foreignId('payer_id');
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
        Schema::dropIfExists('salary_reports');
    }
};
