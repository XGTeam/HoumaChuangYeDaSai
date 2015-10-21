<?php

namespace GrahamCampbell\BootstrapCMS\Models\Relations;

trait HasOneProjectTrait
{
  public function project()
  {
    return $this->hasOne('GrahamCampbell\BootstrapCMS\Models\Project');
  }

  public function deleteProject()
  {
    $this->project()->delete();
  }
}
