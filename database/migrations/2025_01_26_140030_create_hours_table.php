<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hours', function (Blueprint $table) {
            $table->id();
            $table->time('hour');
            $table->date('date');
            $table->boolean('available')->default(true);
            $table->string('day');
            $table->foreignId('service_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hours', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('hours');
    }
};
