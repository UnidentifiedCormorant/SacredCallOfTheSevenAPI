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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('defaultImage')->nullable()->default(null);
            $table->string('goldImage')->nullable()->default(null);
            $table->string('region');
            $table->integer('hp')->default(10);

            $table->unsignedBigInteger('element_id');
            $table->unsignedBigInteger('weaponType_id');
            $table->unsignedBigInteger('storyId');

            $table->timestamps();
            $table->boolean('linkable')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
