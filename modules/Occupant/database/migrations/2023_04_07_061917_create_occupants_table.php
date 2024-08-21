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
        Schema::create('occupants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->default(1);
            $table->foreignUuid('user_id');
            $table->foreignUuid('apartment_id');
            $table->foreignUuid('room_id')->nullable();
            $table->foreignUuid('status_code')->default(1)->nullable();
            $table->timestamp('moved_in')->nullable()->useCurrent();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'room_id'], 'occupant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occupants');
    }
};
