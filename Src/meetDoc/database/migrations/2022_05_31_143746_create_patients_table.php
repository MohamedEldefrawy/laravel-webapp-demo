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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->float('weight')->nullable(true);
            $table->float('height')->nullable(true);;
            $table->enum('gender', ['male', 'female'])->nullable(true);;
            $table->integer('age')->nullable(true);;
            $table->string('blood_type')->nullable(true);;
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
