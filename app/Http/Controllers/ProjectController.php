<?php

namespace GrahamCampbell\BootstrapCMS\Http\Controllers;

use GrahamCampbell\Binput\Facades\Binput;
use GrahamCampbell\BootstrapCMS\Models\Project;
use GrahamCampbell\Credentials\Facades\Credentials;

class ProjectController extends AbstractController
{
  public function __construct()
  {
    $this->setPermissions([
      'getLoginUserProject' => 'user',
      'create' => 'user'
    ]);

    parent::__construct();
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

  public function create()
  {
    $user = Credentials::getUser();

    if ($user->isHasProject()) {
      return Redirect::route('account.project')->with('error', '每人只能拥有一个参赛项目，您不能再添加新的参赛项目。');
    }

    return view('projects.create');
  }

  public function store()
  {
    var_dump(Binput::all()); exit;
  }
}
