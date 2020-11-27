<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('occurrences')->nullable();
            $table->longText('notifications')->nullable();
            $table->integer('calendar_type')->default(1);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('all_day')->default(0);
            $table->time('start_time')->default('00:00:00');
            $table->time('end_time')->nullable();
            $table->longText('description')->nullable();
            $table->longText('guests')->nullable();
            $table->string('location')->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->string('visio_url')->nullable();
            $table->string('color')->nullable();
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
        Schema::dropIfExists('calendars');
    }
}
