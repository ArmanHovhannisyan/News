<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_hy');
            $table->text('short_description_en');
            $table->text('short_description_ru');
            $table->text('short_description_hy');
            $table->longText('long_description_en');
            $table->longText('long_description_ru');
            $table->longText('long_description_hy');
            $table->string('view')->default(0);
            $table->string('avatar');
            $table->timestamps();



            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
