<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreaktimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breaktime', function (Blueprint $table) {
            $table->id();
            $table->foreignId('timestamp_id')->constrained()->cascadeOnDelete();
            $table->datetime('break_Start');
            $table->datetime('break_End');
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
        Schema::dropIfExists('breaktime');
    }
}
