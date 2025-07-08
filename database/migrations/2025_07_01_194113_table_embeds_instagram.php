<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('instagram_embeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('url');
            $table->dateTime('posted_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instagram_embeds');
    }
};