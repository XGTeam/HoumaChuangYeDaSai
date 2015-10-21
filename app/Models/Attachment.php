<?php

namespace GrahamCampbell\BootstrapCMS\Models;

use GrahamCampbell\Credentials\Models\AbstractModel;
use GrahamCampbell\BootstrapCMS\Models\Relations\BelongsToProjectTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Attachment extends AbstractModel implements StaplerableInterface
{
  use BelongsToProjectTrait, EloquentTrait;

  protected $fillable = ['avatar'];

  public function __construct(array $attributes = array()) {
    $this->hasAttachedFile('avatar');

    parent::__construct($attributes);
  }
}
