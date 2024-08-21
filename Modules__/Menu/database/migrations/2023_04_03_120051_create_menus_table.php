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
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('parent_id')->nullable();
            $table->boolean('active')->default(0);
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('url');
            $table->string('icon')->nullable()->default('fa fa-home');
            $table->integer('priority')->nullable()->default(1);
            $table->json('permissions')->nullable();
            $table->timestamps();

            $table->unique(['parent_id', 'name'], 'menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
