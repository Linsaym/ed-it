<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('intervals', function (Blueprint $table) {
            $table->id();
            $table->integer('start')->nullable(false);
            $table->integer('end')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('intervals');
    }
};
