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
        Schema::table('working_slots', function (Blueprint $table) {
            $table->foreign('week_day_id')->references('id')->on('week_days');
            $table->foreign('doctor_service_id')->references('id')->on('doctor_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('working_slots', function (Blueprint $table) {
            //
        });
    }
};
