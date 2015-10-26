<?php
namespace GrahamCampbell\BootstrapCMS\Presenters;

use Config;
use Illuminate\Support\Arr;
use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the attachment presenter class.
 */
class AttachmentPresenter extends BasePresenter
{
    public function __construct($resource)
    {
      $this->wrappedObject = $resource;
    }

    public function initialPreview()
    {
      $attachment = $this->wrappedObject;
      $fileType   = Arr::first(explode('/', $attachment->avatar_content_type));

      switch (strtolower($fileType)) {
        case 'image':
          return "<img src=\"{$attachment->avatar->url()}\" class=\"file-preview-image\">";
          break;
        default:
          break;
      }
    }

    public function initialPreviewConfig()
    {
      $attachment = $this->wrappedObject;
      return array(
        'caption' => '附件:' . $attachment->avatar_file_name,
        'url'     => 'attachments/delete',
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

