<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('uri_fr');
            $table->string('uri_en');
            $table->string('title_fr');
            $table->string('title_en');
            $table->longText('content_fr');
            $table->longText('content_en');
            $table->string('meta_img')->default('default-meta.jpg');
            $table->string('meta_title_fr')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_keywords_fr')->nullable();
            $table->string('meta_keywords_en')->nullable();
            $table->text('meta_description_fr')->nullable();
            $table->text('meta_description_en')->nullable();
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
        Schema::dropIfExists('products');
    }
}
