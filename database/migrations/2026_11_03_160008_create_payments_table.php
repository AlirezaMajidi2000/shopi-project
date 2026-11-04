<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')
                ->unique()
                ->constrained('carts')
                ->cascadeOnDelete();
            $table->string('order_number')->unique();
            $table->decimal('subtotal', 15, 2);
            $table->decimal('shipping_cost', 15, 2)->default(0);
            $table->decimal('total', 15, 2);
            $table->enum('status', ['pending', 'paid', 'shipped', 'delivered', 'cancelled'])
                ->default('pending');
            $table->string('receiver_name');
            $table->string('receiver_phone', 11);
            $table->text('shipping_address');
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
