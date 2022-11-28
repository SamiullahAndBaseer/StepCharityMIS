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
        Schema::create('user_guarantees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('phone_number');
            $table->string('whatsapp')->nullable();
            $table->string('id_card_number');
            $table->string('DoB');
            $table->string('email')->nullable();
            $table->boolean('gender');
            $table->string('photo');
            $table->string('original_address');
            $table->string('current_address');
            $table->text('description');
            $table->foreignId('user_id');
            $table->foreignId('survey_id');
            $table->enum('relation', ['Brother', 'Imam', 'Uncle', 'Neighbor', 'Other']);
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
        Schema::dropIfExists('user_guarantees');
    }
};
