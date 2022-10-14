<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_slots', function (Blueprint $table) {
            $table->id();
            $table->time('start_time');
            $table->unsignedBigInteger('slot_duration');
            $table->unsignedBigInteger('break_time_in_minutes');
            $table->unsignedBigInteger('week_day_id');
            $table->unsignedBigInteger('doctor_service_id');
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
        Schema::dropIfExists('working_slots');
    }
};
