<?php

namespace GrahamCampbell\BootstrapCMS\Http\Controllers;

use GrahamCampbell\Binput\Facades\Binput;
use GrahamCampbell\BootstrapCMS\Models\Attachment;
use GrahamCampbell\BootstrapCMS\Repositories\AttachmentRepository;

class AttachmentController extends AbstractController
{
  public function __construct()
  {
    $this->setPermissions([
      'store' => 'user'
    ]);
  }

  public function store()
  {
    $files = array_get(Binput::all(), 'project.attachments');

    if (!empty($files)) {
      $uploaded = [];

      foreach ($files as $file) {
        $attachment = new Attachment();
        $attachment->avatar = $file;
        $attachment->save();

        array_push($uploaded, $attachment);
      }

      return response()->json(AttachmentRepository::krajee($uploaded));
    }
  }
}
