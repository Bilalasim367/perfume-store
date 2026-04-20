<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->enum('placement', ['home', 'product', 'cart', 'checkout'])->nullable()->after('link');
            $table->timestamp('starts_at')->nullable()->after('is_active');
            $table->timestamp('ends_at')->nullable()->after('starts_at');
        });
    }

    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn(['placement', 'starts_at', 'ends_at']);
        });
    }
};
