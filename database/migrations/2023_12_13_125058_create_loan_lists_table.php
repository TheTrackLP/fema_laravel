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
            $table->integer('ref_no')->nullable();
            $table->string('borrower_id')->nullable();
            $table->longText('purpose')->nullable();
            $table->float('shared_cap')->nullable();
            $table->float('amount')->nullable();
            $table->float('amount_borrowed')->nullable();
            $table->integer('plan_id')->nullable();
            $table->tinyInteger('yservice')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->datetime('date_released')->nullable();
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