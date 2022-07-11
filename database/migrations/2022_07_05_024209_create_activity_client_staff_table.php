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
        Schema::create('activity_client_staff', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('staff_id');
            $table->foreignId('client_id');
            $table->foreignId('activity_id');
            $table->date('date');
            $table->text('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_client_staff');
    }
};
