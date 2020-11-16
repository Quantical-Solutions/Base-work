<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('backups_limit')->default(10);
            $table->boolean('multi_lang')->default(0);
            $table->decimal('limit_drive', 50, 2);
            $table->longText('drive_faqs')->nullable();
            $table->longText('drive_privacy')->nullable();
            $table->bigInteger('full_drive')->default(10);
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
        Schema::dropIfExists('settings');
    }
}
