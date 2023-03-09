<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->string('name');
            $table->string('slug')->nullable();
            $table->foreignUuid('apartment_id')->constrained()->cascadeOnUpdate();
            $table->boolean('active')->nullable()->default(0);
            //
            $table->uuid('id')->primary();
            $table->timestamps();

            $table->unique(['name', 'apartment_id'], 'apartment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
