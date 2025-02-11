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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->string("short_description",200);
            $table->string("description",1000)->nullable();
            $table->string("tags",100);
            $table->string("nsfw_Level",100);
            $table->string("qr",100);
            $table->string("body",100);
            $table->string("bgm",100)->nullable();
            $table->string("preview",100);
            $table->string("preview2",100);
            $table->string("icon",100)->nullable();
            $table->string("uploader",100);
            $table->integer("category_id");
            $table->integer("downloads");
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->string("youtube_link",200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};