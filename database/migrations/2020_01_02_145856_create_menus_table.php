<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('back_front',[1,2]);
            $table->string('route_name','20')->comment('路由名称');
            $table->string('route_url','32')->nullable()->comment('路由地址');
            $table->integer('route_pid')->default(0)->comment('上级路由id');
            $table->enum('route_sign',[1,2])->comment('是否展示在左侧菜单列表');
            $table->integer('route_sort')->default(1)->comment('路由排序');
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
        //Schema::dropIfExists('menus');
    }
}
