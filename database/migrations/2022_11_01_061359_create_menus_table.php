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
        Schema::create('menus', function (Blueprint $table) {
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('url');
            $table->string('icon')->nullable();
            $table->string('tag')->nullable();
            $table->integer('priority')->nullable()->default(0);
            $table->boolean('active')->nullable()->default(1);
            $table->foreignUuid('parent_id')->nullable();
            //
            $table->uuid('id')->primary();
            $table->timestamps();

            $table->unique(['parent_id', 'name', 'tag'], 'menu');
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
