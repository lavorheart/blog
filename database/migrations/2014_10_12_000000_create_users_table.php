<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('ppp_users', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('name')->unique();
    //         $table->string('email')->unique();
    //         $table->string('avatar')->default('default.jpg');
    //         $table->string('password');
    //         $table->rememberToken();
    //         $table->timestamps();
    //     });
    // }
     public function up()
    {
        Schema::create('userDetail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->string('nickName')->default('昵称');
            $table->string('email')->default('格式你的邮箱@xx.com');
            $table->string('qq')->default('请输入你的qq号码');
            $table->string('sex')->default('m');
            $table->string('photo')->default('default.jpg');
            $table->string('num')->default('0');
            $table->string('level')->default('小清新');
        });

         Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userName');
            $table->string('password');
            $table->integer('auth')->default('1');
            $table->integer('status')->default('1');
            $table->string('remember_token');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
           
        });
          Schema::create('type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('status')->default('1');
            $table->integer('pid')->default('0');
            $table->string('path')->default('0');
            $table->string('blogo')->default('default.jpg');  
        });
           Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('tid');
            $table->text('title');
            $table->timestamp('ctime');
            $table->integer('count');  
            $table->integer('recycle');  
        });
           Schema::create('reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('pid');
            $table->text('content');
            $table->timestamp('ctime');
        });
            Schema::create('friendlink', function (Blueprint $table) {
            $table->increments('id');
            $table->string('linkname')->unique();
            $table->string('url');
            $table->string('logo');
            $table->text('content');
            $table->integer('ordernum');
        });
            Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('webname');
            $table->string('keywords');
            $table->string('logo');
            $table->string('copy');
            $table->string('Adver')->default('default.jpg');
            $table->integer('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
