<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->boolean('published')->default(0);
            $table->string('uri_fr');
            $table->string('uri_en');
            $table->string('title_fr');
            $table->string('title_en');
            $table->longText('content_fr');
            $table->longText('content_en');
            $table->string('img_1');
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
