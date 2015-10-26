<?php

namespace GrahamCampbell\BootstrapCMS\Repositories;

use Config;
use Request;
use Illuminate\Support\Arr;
use GrahamCampbell\Credentials\Repositories\AbstractRepository;

class AttachmentRepository extends AbstractRepository
{
  public static function krajee($uploaded, $error = '', $append = true)
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
      array_push($result['initialPreview'], self::initialPreview($item));
      array_push($result['initialPreviewConfig'], self::initialPreviewConfig($item));
    }

    return $result;
  }

  public static function initialPreview($attachment)
  {
    $fileType   = current(explode('/', $attachment->avatar_content_type));

    switch (strtolower($fileType)) {
    case 'image':
      return "<img src=\"{$attachment->avatar->url()}\" class=\"file-preview-image\">";
      break;
    case 'text':
      $content = file_get_contents($attachment->avatar->path());
      return "<pre class=\"file-preview-text\" title=\"{$attachment->avatar->originalFilename()}\" style=\"width:160px;height:160px;\">{$content}</pre>\n";
      break;
    case 'video':
      return "<video width=\"213px\" height=\"160px\" controls> <source src=\"{$attachment->avatar->url()}\" type=\"{$attachment->avatar_content_type}\"> <div class=\"file-preview-other\"> <span class=\"file-icon-4x\"><i class=\"glyphicon glyphicon-file\"></i></span> </div> </video>";
      break;
    default:
      return "<object class=\"file-object\" data=\"" . Request::root() . "{$attachment->avatar->url()}\" type=\"{$attachment->avatar_content_type}\" width=\"160px\" height=\"160px\"> <param name=\"movie\" value=\"{$attachment->avatar->originalFilename()}\"> <param name=\"controller\" value=\"true\"> <param name=\"allowFullScreen\" value=\"true\"> <param name=\"allowScriptAccess\" value=\"always\"> <param name=\"autoPlay\" value=\"false\"> <param name=\"autoStart\" value=\"false\"> <param name=\"quality\" value=\"high\"> <div class=\"file-preview-other\"> <span class=\"file-icon-4x\"><i class=\"glyphicon glyphicon-file\"></i></span> </div> </object>";
      break;
    }
  }

  public static function initialPreviewConfig($attachment)
  {
    return array(
      'caption' => '附件:' . $attachment->avatar_file_name,
      'url'     => '/attachments/delete',
      'key'     => $attachment->id,
      'extra'   => [
        'id' => $attachment->id
      ]
    );
  }

  protected function mimeToFileExtension($type)
  {
    $mimes = Config::get('mimes');

    foreach ($mimes as $extension => $contentTypes) {
      if (is_array($contentTypes)) {
        foreach ($contentTypes as $contentType) {
          if ($type == $contentType) {
            return $extension;
          }
        }
      } else {
        if ($type == $contentTypes) {
          return $extension;
        }
      }
    }

    return null;
  }
}
