<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('city');
            $table->string('product_name');
            $table->string('product_image');
            $table->timestamp('purchased_at');
            $table->boolean('is_displayed')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_notifications');
    }
};
