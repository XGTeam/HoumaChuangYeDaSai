<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('members', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('project_id')->unsigned()->index();
      $table->string('name');
      $table->integer('age');
      $table->tinyInteger('sex');
      $table->string('title');
      $table->string('diploma');
      $table->string('academy');
      $table->text('description');
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
    Schema::drop('members');
  }
}
