<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('projects', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned()->index();
      // 负责人名称
      $table->string('leader_name');
      // 负责人联系方式(手机或者电话)
      $table->string('leader_phone');
      // 项目名称
      $table->string('name');
      // 项目主页
      $table->string('home_page')->nullable();
      // 项目阶段
      $table->string('step');
      // 项目封面
      $table->string('avatar_file_name')->nullable();
      $table->integer('avatar_file_size')->nullable();
      $table->string('avatar_content_type')->nullable();
      $table->timestamp('avatar_updated_at')->nullable();
      // 项目概要
      $table->text('brief');
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
    Schema::drop('projects');
  }
}
