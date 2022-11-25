<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string("file");
            $table->string("filename");
            $table->unsignedBigInteger("branch")->nullable();
            $table->unsignedBigInteger("department")->nullable();
            $table->unsignedBigInteger('receiver')->nullable();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->foreignId("user_id")->references("id")->on("users");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('files');
    }
};
