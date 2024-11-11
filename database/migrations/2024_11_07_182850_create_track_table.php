<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 32);
            $table->foreignId('page_id')->constrained('pages');
            $table->timestamp('datetime')->useCurrent();
            $table->string('user_agent', 50);
            $table->string('timezone', 50);
            $table->ipAddress('ip');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
