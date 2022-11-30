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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('quality');
            $table->float('price');
            $table->string('bill_image');
            $table->string('discount');
            $table->enum('status_for_buying', ['Waiting', 'Purchased'])->default('Waiting');
            $table->boolean('general_office_status')->default(2);
            $table->boolean('financial_status_afg')->default(2);
            $table->foreignId('currency_id');
            $table->foreignId('proposal_id');
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
        Schema::dropIfExists('quotations');
    }
};
