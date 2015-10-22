<?php

namespace GrahamCampbell\BootstrapCMS\Http\Controllers;

use GrahamCampbell\BootstrapCMS\Models\Project;
use GrahamCampbell\Credentials\Facades\Credentials;

class ProjectController extends AbstractController
{
  public function __construct()
  {
    $this->setPermissions([
      'getLoginUserProject' => 'user'
    ]);
  }

  /**
   * 获取登录用户的参赛项目资料
   **/
  public function getLoginUserProject()
  {
    $user    = Credentials::getUser();
    $project = $user->project()->with('attachments', 'members', 'user')->first();
    return view('projects.show', compact('project'));
  }
}
