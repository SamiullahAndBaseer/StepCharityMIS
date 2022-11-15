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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('tag_no');
            $table->string('office');
            $table->foreignId('item_type_id');
            $table->text('description');
            $table->string('serial');
            $table->string('manufacture');
            $table->string('model');
            $table->datetime('date_purchase');
            $table->foreignId('user_id');
            $table->string('checkout_instock');
            $table->integer('quantity');
            $table->float('total_cost_lc');
            $table->float('total_cost_usd');
            $table->enum('donation_purchase', ['donation', 'purchase']);
            $table->string('location');
            $table->string('vendor');
            $table->string('condition');
            $table->string('age_in_year');
            $table->string('useful_life');
            $table->float('current_value_lc');
            $table->float('current_value_usd');
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
        Schema::dropIfExists('inventories');
    }
};
