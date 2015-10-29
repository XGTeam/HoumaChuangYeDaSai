<?php

namespace GrahamCampbell\BootstrapCMS\Http\Controllers;

use Request;
use GrahamCampbell\Binput\Facades\Binput;
use GrahamCampbell\BootstrapCMS\Models\Attachment;
use GrahamCampbell\BootstrapCMS\Repositories\AttachmentRepository;

class AttachmentController extends AbstractController
{
  public function __construct()
  {
    $this->setPermissions([
      'store' => 'user',
      'destroy' => 'user',
    ]);
  }

  public function store()
  {
    $files = array_get(Request::all(), 'project.attachments');

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

  public function destroy()
  {
    $id = Binput::get('id');

    Attachment::destroy($id);
    return response()->json([]);
  }

  public function download($id)
  {
    $attachment = Attachment::find($id);

    return response()->download($attachment->avatar->path());
  }
}
