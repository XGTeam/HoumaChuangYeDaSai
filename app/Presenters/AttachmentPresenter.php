<?php
namespace GrahamCampbell\BootstrapCMS\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;
use GrahamCampbell\BootstrapCMS\Models\Attachment;

/**
 * This is the attachment presenter class.
 */
class AttachmentPresenter extends BasePresenter
{
    public function __construct(Attachment $resource)
    {
      parent::__construct($resource);
    }

    public function initialPreview()
    {
      return $this->wrappedObject->avatar->url();
    }
}

