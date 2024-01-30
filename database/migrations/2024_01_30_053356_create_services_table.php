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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title_ky');
            $table->string('title_tr');
            $table->string('logo')->nullable();
            $table->longText('description_ky')->nullable();
            $table->longText('description_tr')->nullable();
            $table->timestamps();

            $table->index('category_id', 'service_category_idx');

            $table->foreign('category_id', 'service_category_fk')
                ->on('categories')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
