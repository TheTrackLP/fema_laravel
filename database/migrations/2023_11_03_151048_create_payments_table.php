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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('loan_id')->nullable();
            $table->integer('borrower_id')->nullable();
            $table->integer('of_re')->nullable();
            $table->integer('plan_id')->nullable();
            $table->float('paid')->nullable();
            $table->integer('interest')->nullable();
            $table->integer('capital')->nullable();
            $table->float('penalty_amount')->nullable();
            $table->tinyInteger('overdue')->nullable();
            $table->timestamp('date_created')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};