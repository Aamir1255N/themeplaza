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
            $table->string("description",1000);
            $table->string("tags",100);
            $table->string("nsfw_Level",100);
            $table->string("audio",100);
            $table->string("qr",100);
            $table->string("body",100);
            $table->string("bgm",100);
            $table->string("preview",100);
            $table->string("icon",100);
            $table->string("uploader",100);
            $table->integer("category_id");
            $table->integer("downloads");
            $table->integer("likes");
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
