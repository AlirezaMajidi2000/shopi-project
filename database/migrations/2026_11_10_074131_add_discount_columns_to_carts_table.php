<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->foreignId('discount_code_id')
                ->nullable()
                ->after('user_id')
                ->constrained('discount_codes')
                ->nullOnDelete();

            $table->unsignedTinyInteger('discount_percent')
                ->default(0)
                ->after('discount_code_id');
        });
    }

    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('discount_code_id');
            $table->dropColumn('discount_percent');
        });
    }
};
