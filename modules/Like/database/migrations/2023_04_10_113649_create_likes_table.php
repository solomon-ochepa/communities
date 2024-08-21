<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->foreignUuid('reaction_id')->default('like');
            $table->nullableUuidMorphs('likeable');
            $table->timestamps();

            $table->unique(['user_id', 'likeable_type', 'likeable_id'], 'like');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};
