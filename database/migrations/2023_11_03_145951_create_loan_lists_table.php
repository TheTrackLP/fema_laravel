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
        Schema::create('loan_lists', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no')->nullable();
            $table->integer('borrower_id')->nullable();
            $table->text('purpose')->nullable();
            $table->double('amount')->nullable();
            $table->double('amount_borrowed')->nullable();
            $table->integer('plan_id')->nullable();
            $table->tinyInteger('year_service')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_lists');
    }
};