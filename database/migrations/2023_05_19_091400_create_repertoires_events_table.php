<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
    /**
     * Run the migrations.
     *
     * @return void
     */
{
    public function up()
    {
        Schema::create('repertoire_event', function (Blueprint $table) {
            $table->foreignId('repertoire_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->primary(['repertoire_id', 'event_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repertoire_event');
    }
};
