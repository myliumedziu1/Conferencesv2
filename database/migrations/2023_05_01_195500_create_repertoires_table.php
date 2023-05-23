<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepertoiresTable extends Migration
{
    public function up()
    {
        Schema::create('repertoires', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->default('')->nullable();
            $table->text('brief_description');
            $table->text('full_description');
            $table->text('book')->nullable();
            $table->text('bookauthor')->nullable();
            $table->text('additional1')->nullable();
            $table->text('additional2')->nullable();
            $table->string('image_path');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }


public function down()
{
Schema::dropIfExists('repertoires');
}
}
