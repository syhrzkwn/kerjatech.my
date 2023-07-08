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
        Schema::create('freelances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('available_date');
            $table->string('available_in');
            $table->enum('looking_for', array('Full time', 'Part time', 'Internship', 'Contract'));
            $table->string('preferred_position');
            $table->enum('interested_role', array('Junior', 'Senior', 'Entry-Level', 'Mid-Level', 'High-Level'));
            $table->enum('mode', array('Remote', 'In-office', 'Hybrid'));
            $table->string('url');
            $table->longText('profile');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelances');
    }
};
