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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('title_ky');
            $table->string('title_tr');
            $table->longText('description_ky')->nullable();
            $table->longText('description_tr')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            $table->index('service_id', 'file_service_idx');

            $table->foreign('service_id', 'file_service_fk')
                ->on('services')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
