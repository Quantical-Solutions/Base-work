<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_visits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visitor_id')->unsigned();
            $table->foreign('visitor_id')->references('id')->on('stats_visitors');
            $table->string('page_title');
            $table->string('page_link');
            $table->bigInteger('page_duration');
            $table->string('ip_address')->nullable();
            $table->bigInteger('hits');
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
        Schema::dropIfExists('stats_visits');
    }
}
