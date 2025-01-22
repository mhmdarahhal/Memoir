<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('memoir', function (Blueprint $table) {
            $table->id('memoirid');
            $table->text('body');
            $table->string('category');
            $table->string('mood');
            $table->string('title');
            $table->date('date');
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('userid')->on('user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memoir');
    }
};
