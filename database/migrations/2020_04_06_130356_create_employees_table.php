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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id');
            $table->string('number')->nullable()->unique();
            $table->timestamp('employed_at');
            $table->foreignId('department_id');
            $table->foreignId('designation_id');
            $table->longText('about')->nullable();
            $table->foreignUuid('status_code')->nullable()->default(status('success', 3))->constrained('statuses', 'code')->cascadeOnUpdate()->nullOnDelete();
            $table->auditColumn();
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
        Schema::dropIfExists('employees');
    }
};
