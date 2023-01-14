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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('youtube_link');
            $table->foreignId('image_id')->constrained();
            $table->foreignId('group_id')->constrained();
            $table->string('name')->unique();
            $table->text('information');
            $table->foreignId('emotion_id')->nullable()->constrained();
            $table->foreignId('period_id')->nullable()->constrained();
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
        Schema::dropIfExists('songs');
    }
};
