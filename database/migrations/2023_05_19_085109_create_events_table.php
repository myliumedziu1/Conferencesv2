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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repertoire_id')->constrained()->onDelete('cascade');
            $table->enum('event_type', ['Live', 'Online']);
            $table->string('location')->nullable();
            $table->dateTime('event_date')->nullable();
            $table->string('ticket_url');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('events');
    }
};
