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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_tr');
            $table->string('video')->nullable();
            $table->string('video_tr')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            $table->index('service_id', 'video_service_idx');

            $table->foreign('service_id', 'video_service_fk')
                ->on('services')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
