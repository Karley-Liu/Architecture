<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users',function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->tinyInteger('user_type_id');  //区分用户类型，1为甲方，2为乙方，3为自媒体，4为管理员
        	$table->string('name');
        	$table->string('email',100)->unique();
        	$table->string('password');
        	$table->string('avatar');  //审核文件路径
        	$table->string('logo')->default('logo/defaultlogo.jpg');  //用户logo
        	$table->string('tag_user')->nullable(true);//乙方公司擅长
        	$table->string('continent')->nullable(true);
        	$table->string('country')->nullable(true);
        	$table->string('city')->nullable(true);
        	$table->string('address')->nullable(true);
        	$table->string('phone')->nullable(true);
        	$table->string('com_url')->nullable(true);
        	$table->string('introduce')->nullable(true);
        	$table->tinyInteger('is_vip')->default(0);  //0为普通用户，1为vip
        	$table->tinyInteger('is_pass')->default(0);  //0为等待通过审核，1为已通过审核
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
        Schema::dropIfExists('users');
    }
}
