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
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('number')->nullable();
            $table->string('description')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');

            $table->unique(['country', 'state', 'city', 'postal_code', 'area', 'street', 'number'], 'address');

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
        Schema::dropIfExists('addresses');
    }
};
