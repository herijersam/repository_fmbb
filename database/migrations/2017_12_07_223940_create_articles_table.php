<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unique();
            $table->string('titre');
            $table->string('contenu');
            $table->timestamps();
            $table->string('tag');
            $table->string('slug');
            $table->string('seo');
            $table->integer('administrateurs_id')->unique();
            $table->integer('images_id')->unique();
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
