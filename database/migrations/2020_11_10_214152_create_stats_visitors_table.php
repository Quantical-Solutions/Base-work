<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_visitors', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->string('ip_address')->nullable();
            $table->string('device')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('flag')->nullable();
            $table->string('continent')->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
            $table->string('browser_picto')->nullable();
            $table->string('os_client')->nullable();
            $table->string('os_version')->nullable();
            $table->string('os_picto')->nullable();
            $table->string('referrer_site')->nullable();
            $table->string('keywords')->nullable();
            $table->string('sentence')->nullable();
            $table->string('engine')->nullable();
            $table->string('engine_picto')->nullable();
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
        Schema::dropIfExists('stats_visitors');
    }
}
