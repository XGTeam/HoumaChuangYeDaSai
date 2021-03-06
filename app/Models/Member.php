<?php

namespace GrahamCampbell\BootstrapCMS\Models;

use GrahamCampbell\Credentials\Models\AbstractModel;
use GrahamCampbell\BootstrapCMS\Models\Relations\BelongsToProjectTrait;

class Member extends AbstractModel
{
  use BelongsToProjectTrait;

  protected $fillable = [
    'name', 'age', 'sex', 'title', 'diploma', 'academy', 'description'
  ];
}
