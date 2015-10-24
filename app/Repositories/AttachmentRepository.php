<?php

namespace GrahamCampbell\BootstrapCMS\Repositories;

use GrahamCampbell\Credentials\Repositories\AbstractRepository;

class AttachmentRepository extends AbstractRepository
{
  public static function krajee($uploaded, $append = true)
  {
    if (!is_array($uploaded)) {
      $uploaded = [$uploaded];
    }

    $result = [
      'initialPreview' => [],
      'initialPreviewConfig' => [],
      'append' => $append
    ];

    foreach ($uploaded as $item) {
      array_push($result['initialPreview'], $item->initialPreview);
    }

    return $result;
  }
}
