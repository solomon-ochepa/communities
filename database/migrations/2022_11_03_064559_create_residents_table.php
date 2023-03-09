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
        Schema::create('residents', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignUuid('room_id')->constrained()->cascadeOnUpdate();
            // $table->foreignUuid('apartment_id')->constrained()->cascadeOnUpdate();
            //
            $table->uuid('id')->primary();
            $table->timestamps();

            $table->unique(['user_id', 'room_id'], 'resident');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residents');
    }
};
