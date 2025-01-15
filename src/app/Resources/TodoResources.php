<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
  /**
   * リソースを配列に変換
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request): array
  {
    return [
      'id' => $this->id,
      'title' => $this->title,
      'user_id' => $this->user_id,
      'content' => $this->content,
      'is_completed' => $this->is_completed,
      'is_deleted' => $this->is_deleted,
    ];
  }
}
