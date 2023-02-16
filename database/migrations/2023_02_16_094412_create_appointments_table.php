<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id("appointment_id");
            $table->foreignId("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreignId("sales_people_id");
            $table->foreign("sales_people_id")->references("id")->on("sales_people");
            $table->dateTime("start_appointment_date");
            $table->dateTime("end_appointment_date");
            $table->string("subject");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
