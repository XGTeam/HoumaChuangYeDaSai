<?php

namespace GrahamCampbell\BootstrapCMS\Models\Relations;

trait HasManyAttachmentsTrait
{
  public function attachments()
  {
    return $this->hasMany('GrahamCampbell\BootstrapCMS\Models\Attachment');
  }

  public function deleteAttachments()
  {
    foreach ($this->attachments()->get(['id']) as $attachment) {
      $attachment->delete();
    }
  }
}
