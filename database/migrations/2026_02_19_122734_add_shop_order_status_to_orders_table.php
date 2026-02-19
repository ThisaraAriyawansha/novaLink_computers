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
        Schema::table('orders', function (Blueprint $table) {
            // Per-order-line status managed independently by each shop owner
            $table->string('shop_order_status')->default('pending')->after('payment_id');
            // pending | processing | shipped | delivered | cancelled
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('shop_order_status');
        });
    }
};
