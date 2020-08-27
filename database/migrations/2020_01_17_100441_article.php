<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('article',function (Blueprint $table){
            $table->increments('id');
            $table->integer('article_cate')->comment('文章分类id');
            $table->string('article_title')->comment('标题');
            $table->string('article_keyword')->comment('关键词');
            $table->string('article_desc')->comment('描述');
            $table->string('img_url')->comment('文章封面图');
            $table->text('content')->comment('文章内容');
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
        //
    }
}
