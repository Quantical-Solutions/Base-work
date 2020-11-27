<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->boolean('qs_entity')->default(0);
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('siren')->unique()->nullable();
            $table->string('siret')->unique()->nullable();
            $table->string('naf')->nullable();
            $table->string('address');
            $table->string('address_details')->nullable();
            $table->string('zip');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('country');
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('contact')->nullable();
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
        Schema::dropIfExists('entities');
    }
}
