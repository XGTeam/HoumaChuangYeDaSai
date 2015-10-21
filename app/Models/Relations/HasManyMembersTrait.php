<?php

namespace GrahamCampbell\BootstrapCMS\Models\Relations;

trait HasManyMembersTrait
{
  public function members()
  {
    return $this->hasMany('GrahamCampbell\BootstrapCMS\Models\Member');
  }

  public function deleteMembers()
  {
    foreach ($this->members()->get(['id']) as $member) {
      $member->delete();
    }
  }
}
