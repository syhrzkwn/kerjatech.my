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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('company');
            $table->string('website');
            $table->enum('employment_type', array('Full time', 'Part time', 'Internship', 'Contract'));
            $table->bigInteger('salary');
            $table->enum('mode', array('Remote', 'In-office', 'Hybrid'));
            $table->enum('experience', array('0 to 1 year', '1 to 3 years', '3 to 5 years', '5 to 10 years', '10+ years'));
            $table->string('location');
            $table->string('url');
            $table->string('email');
            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
