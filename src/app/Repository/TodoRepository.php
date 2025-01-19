<?php

namespace App\Repository;

use App\Domain\Interfaces\TodoRepositoryInterface;
use App\Domain\Entity\Todo as EntityTodo;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
  public function findAll(): array
  {
    return Todo::all()->toArray();
  }

  public function findById(int $id): ?EntityTodo
  {
    $record = Todo::find($id);
    if ($record === null) {
      return null;
    }
    return new EntityTodo($record->id, $record->user_id, $record->title, $record->content, $record->is_done, $record->is_deleted);
  }

  public function findByUserId(int $user_id): ?EntityTodo
  {
    $record = Todo::where('user_id', $user_id)->first();
    if ($record === null) {
      return null;
    }
    return new EntityTodo($record->id, $record->user_id, $record->title, $record->content, $record->is_done, $record->is_deleted);
  }

  public function store(EntityTodo $todo): int
  {
    $eloquentTodo = Todo::create([
      'user_id' => $todo->getUserId(),
      'title' => $todo->getTitle(),
      'content' => $todo->getContent(),
      'is_done' => $todo->getIsDone(),
      'is_deleted' => $todo->getIsDeleted(),
    ]);
    return (int)$eloquentTodo->id;
  }

  public function update(EntityTodo $todo): void
  {
    $eloquentTodo = Todo::find($todo->getId());
    if ($eloquentTodo !== null) {
      $eloquentTodo->title = $todo->getTitle();
      $eloquentTodo->content = $todo->getContent();
      $eloquentTodo->is_done = $todo->getIsDone();
      $eloquentTodo->is_deleted = $todo->getIsDeleted();
      $eloquentTodo->save();
    }
  }

  public function delete(int $id): void
  {
    Todo::destroy($id);
  }
}
