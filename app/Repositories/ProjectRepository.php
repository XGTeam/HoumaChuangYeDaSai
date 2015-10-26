<?php

namespace GrahamCampbell\BootstrapCMS\Repositories;

use DB;
use Illuminate\Support\Arr;
use GrahamCampbell\BootstrapCMS\Models\Member;
use GrahamCampbell\BootstrapCMS\Models\Project;
use GrahamCampbell\BootstrapCMS\Models\Attachment;
use GrahamCampbell\Credentials\Facades\Credentials;
// use GrahamCampbell\Credentials\Repositories\AbstractRepository;

class ProjectRepository
{
  public function store($input)
  {
    return DB::transaction(function () use ($input) {
      // 保存基本信息
      $project = $this->parseAndCreate($input);
      // 保存成员信息
      $this->parseAndStoreMembers($project, $input);
      // 保存附件信息
      $this->parseAndStoreAttachments($project, $input);

      return $project;
    });
  }

  public function update($project, $input)
  {
    return DB::transaction(function () use ($project, $input) {
      // 保存基本信息
      $this->parseAndUpdate($project, $input);
      // 保存成员信息
      $this->parseAndUpdateMembers($project, $input);
      // 保存附件信息
      $this->parseAndUpdateAttachments($project, $input);

      return $project;
    });
  }

  public function parseAndCreate($input)
  {
    $project = new Project(Arr::get($input, 'project'));

    $project->user_id = Credentials::getUser()->id;
    $project->save();

    return $project;
  }

  public function parseAndUpdate($project, $input)
  {
    $project->fill(Arr::get($input, 'project'));
    $project->save();
  }

  public function parseAndStoreMembers($project, $input)
  {
    $members = Arr::get($input, 'project.members');

    foreach ($members as $attributs) {
      $member = new Member($attributs);
      $member->project_id = $project->id;
      $member->save();
    }
  }

  public function parseAndUpdateMembers($project, $input)
  {
    $project->members()->delete();
    $this->parseAndStoreMembers($project, $input);
  }

  public function parseAndStoreAttachments($project, $input)
  {
    $attachmentIds = Arr::get($input, 'attachment_ids');
    Attachment::whereIn('id', $attachmentIds)->update(['project_id' => $project->id]);
  }

  public function parseAndUpdateAttachments($project, $input)
  {
    $project->attachments()->delete();
    $this->parseAndStoreAttachments($project, $input);
  }
}
