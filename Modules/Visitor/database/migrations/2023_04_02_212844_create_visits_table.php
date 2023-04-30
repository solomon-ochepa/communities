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
        Schema::create('visits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->default(0);
            $table->foreignUuid('visitor_id');
            $table->text('reason');
            $table->text('note')->nullable();
            $table->nullableUuidMorphs('visitable');
            $table->foreignUuid('requested_by');
            $table->foreignUuid('approved_by')->nullable();
            $table->timestamp('arrived_at')->useCurrent(); // next visit should be 1 hour interval
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('checked_in_at')->nullable();
            $table->timestamp('checked_out_at')->nullable();
            $table->foreignUuid('status_code')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['visitor_id', 'visitable_type', 'visitable_id', 'arrived_at'], 'visit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
};
