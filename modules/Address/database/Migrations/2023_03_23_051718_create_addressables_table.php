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
        Schema::create('addressables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('address_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->morphs('addressable');

            $table->unique(['address_id', 'addressable_type', 'addressable_id'], 'addressable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addressables');
    }
};
