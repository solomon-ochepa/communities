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
        Schema::create('gatepasses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->default(1);
            $table->foreignUuid('visit_id');
            $table->string('code');
            $table->timestamp('checked_in_at')->nullable();
            $table->foreignUuid('checked_in_by')->nullable();
            $table->timestamp('checked_out_at')->nullable();
            $table->foreignUuid('checked_out_by')->nullable();
            // $table->foreignUuid('checkpoint_id');
            $table->foreignUuid('status_code')->default(1);
            $table->timestamps();

            $table->unique(['visit_id', 'code'], 'gatepass');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gatepasses');
    }
};
