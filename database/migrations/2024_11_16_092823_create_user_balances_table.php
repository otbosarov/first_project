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
        Schema::create('user_balances', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_value', 10, 2 )->default(0);
            $table->enum('currency', ['UZS','USD'])->default('UZS');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('credit_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_balances');
    }
};
