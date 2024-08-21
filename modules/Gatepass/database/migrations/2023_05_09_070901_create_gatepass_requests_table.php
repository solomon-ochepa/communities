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
        Schema::create('gatepass_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->default(0);
            $table->foreignUuid('gatepass_id');
            $table->string('code')->unique('code');
            $table->uuidMorphs('requestable');
            $table->foreignUuid('status_code')->default(1);
            $table->timestamps();

            $table->unique(['gatepass_id', 'requestable_type', 'requestable_id'], 'gatepass');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gatepass_requests');
    }
};
