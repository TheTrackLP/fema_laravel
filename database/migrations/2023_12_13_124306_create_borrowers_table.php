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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('contact_no')->nullable();
            $table->tinyInteger('year_service')->nullable();
            $table->longText('address')->nullable();
            $table->string('employee_id')->nullable();
            $table->float('shared_capital')->nullable();
            $table->integer('department')->nulable();
            $table->tinyInteger('status')->nullable();
            $table->date('date_birth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers');
    }
};