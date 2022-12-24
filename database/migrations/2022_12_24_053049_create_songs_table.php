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
            $table->string('image');
            $table->string('group');
            $table->string('title');

            $table->foreignId('emotion_id')->constrained('emotions')->onDelete('cascade');

            $table->foreignId('period_id')->constrained('periods')->onDelete('cascade');

            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');

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
