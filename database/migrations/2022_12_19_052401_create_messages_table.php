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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('group_id');
            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_profile')->nullable();
            $table->string('user_branch')->nullable();
            $table->string('user_year')->nullable();
            $table->string('user_role')->nullable();
            $table->string('message')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('messages');
    }
};
