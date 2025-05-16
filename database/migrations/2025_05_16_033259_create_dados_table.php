<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('dados', function (Blueprint $table) {
            $table->id();
            $table->double('ph')->nullable();
            $table->double('temperatura')->nullable();
            $table->double('conditividade')->nullable();
            $table->unsignedBigInteger('hidroponia_id');
            $table->timestamps();

            $table->foreign('hidroponia_id')
                ->references('id')
                ->on('hidroponia');
        });
    }

    public function down(): void {
        Schema::dropIfExists('dados');
    }
};
