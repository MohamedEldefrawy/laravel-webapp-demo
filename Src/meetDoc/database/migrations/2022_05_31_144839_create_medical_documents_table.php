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
        Schema::create('medical_documents', function (Blueprint $table) {
            $table->id();
            $table->text('link');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('uploaded_by');
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('uploaded_by')->references('id')->on('users');
            $table->foreign('appointment_id')->references('id')->on('appointments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_documents');
    }
};
