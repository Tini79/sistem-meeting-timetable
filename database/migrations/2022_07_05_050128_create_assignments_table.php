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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->index()->constrained('staffs')->onDelete('cascade');
            $table->foreignId('client_id')->index()->constrained('clients')->onDelete('cascade');
            $table->foreignId('activity_id')->index()->constrained('activities')->onDelete('cascade');
            $table->date('startDate');
            $table->date('endDate');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('assignments');
    }
};
