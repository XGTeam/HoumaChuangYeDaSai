<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrantsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('entrants', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id');
      // 团队名称
      $table->string('team');
      // 所在行业
      $table->string('trade');
      // 成立日期
      $table->date('established_at');
      // 负责人名称
      $table->string('leader_name');
      // 负责人职位
      $table->string('leader_position');
      // 负责人证件类型
      $table->tinyInteger('leader_id_type');
      // 负责人证件号码
      $table->string('leader_id_number');
      // 负责人联系方式(手机或者电话)
      $table->string('leader_contact');
      // 负责任邮箱
      $table->string('leader_email');
      // 项目名称
      $table->string('project_name');
      // 项目概要
      $table->text('project_brief');
      // 竞赛报名状态
      $table->tinyInteger('status');
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
    Schema::drop('entrants');
  }
}
