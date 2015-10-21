<?php

namespace GrahamCampbell\BootstrapCMS\Models;

use GrahamCampbell\Credentials\Models\AbstractModel;
use GrahamCampbell\Credentials\Models\Relations\BelongsToUserTrait;
use GrahamCampbell\BootstrapCMS\Models\Relations\HasManyMembersTrait;
use GrahamCampbell\BootstrapCMS\Models\Relations\HasManyAttachmentsTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Project extends AbstractModel implements StaplerableInterface
{
  use BelongsToUserTrait, HasManyMembersTrait, HasManyAttachmentsTrait, EloquentTrait;

  protected $fillable = [
    'avatar', 'leader_name', 'leader_phone', 'name', 'home_page', 'step',
    'brief'
  ];

  public function __construct(array $attributes = array()) {
    $this->hasAttachedFile('avatar');

    parent::__construct($attributes);
  }

  public function beforeDelete()
  {
    $this->deleteMembers();
    $this->deleteAttachments();
  }
}
