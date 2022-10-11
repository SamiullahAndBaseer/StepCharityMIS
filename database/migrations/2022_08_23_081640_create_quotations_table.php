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
            $table->boolean('status_for_buying')->default('0');
            $table->boolean('general_office_status')->default('0');
            $table->boolean('finicial_status_afg');
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
