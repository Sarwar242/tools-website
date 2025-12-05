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
        Schema::create('tool_usage', function (Blueprint $table) {
            $table->id();
            $table->string('tool_name', 50);
            $table->string('ip_address', 45);
            $table->string('user_agent')->nullable();
            $table->boolean('is_premium')->default(false);
            $table->json('metadata')->nullable(); // Additional data like file size, QR type, etc.
            $table->timestamp('used_at');
            $table->timestamps();
            
            $table->index(['tool_name', 'used_at']);
            $table->index('ip_address');
            $table->index('used_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_usage');
    }
};
