<?php
namespace GrahamCampbell\BootstrapCMS\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;
use GrahamCampbell\BootstrapCMS\Models\Project;

/**
 * This is the project presenter class.
 */
class ProjectPresenter extends BasePresenter
{
    use OwnerPresenterTrait;

    public function __construct(Project $resource)
    {
      parent::__construct($resource);
    }

    public function title()
    {
      return $this->wrappedObject->name . '(' . $this->wrappedObject->leader_name . ')';
    }
}
