<?php

namespace App\UseCases\Todo;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
  public function __invoke(): Collection
  {
    return Todo::query()
      ->orderBy('created_at', 'desc')
      ->get();
  }
}
