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
        Schema::create('proposal_for_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->boolean('verify_by_branch_director');
            $table->boolean('verify_by_branch_admin');
            $table->boolean('verify_by_main_branch_director');
            $table->boolean('verify_by_main_branch_admin');
            $table->boolean('verify_by_general_office_finince');
            $table->boolean('verify_by_general_office_director');
            $table->string('upload_file');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('proposal_for_items');
    }
};
