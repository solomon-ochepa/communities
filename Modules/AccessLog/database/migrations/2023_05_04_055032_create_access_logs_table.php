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
        Schema::create('access_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuidMorphs('accessible'); // place, person or thing being accessed
            $table->uuidMorphs('accessor');
            //
            $table->timestamp('checked_in_at');
            $table->foreignUuid('checked_in_by')->nullable();
            //
            $table->timestamp('checked_out_at')->nullable();
            $table->foreignUuid('checked_out_by')->nullable();
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
        Schema::dropIfExists('access_logs');
    }
};
