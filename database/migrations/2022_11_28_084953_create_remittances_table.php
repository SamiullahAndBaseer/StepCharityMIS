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
        Schema::create('remittances', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_remittance');
            $table->date('date_of_receive')->default(null);
            $table->integer('remittance_number');
            $table->decimal('amount');
            $table->enum('status', ['Sent', 'Received'])->default('Sent');
            $table->foreignId('sender_id');
            $table->foreignId('receiver_id');
            $table->foreignId('currency_id');
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
        Schema::dropIfExists('remittances');
    }
};
