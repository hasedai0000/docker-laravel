<?php

namespace App\Service;

use App\Domain\Interfaces\TodoRepositoryInterface;
use App\Domain\Entity\Todo as EntityTodo;

class TodoService
{
  private $repository;

  public function __construct(TodoRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function getTodos(): array
  {
    return $this->repository->findAll();
  }

  public function register(int $userId, string $title, string $content): int
  {
    $todo = new EntityTodo(null, $userId, $title, $content, false, false);
    return $this->repository->store($todo);
  }

  public function update(int $id, string $title, string $content, bool $isDone, bool $isDeleted): void
  {
    $todo = $this->repository->findById($id);
    if ($todo !== null) {
      $todo->setTitle($title);
      $todo->setContent($content);
      $todo->setIsDone($isDone);
      $todo->setIsDeleted($isDeleted);
      $this->repository->update($todo);
    }
  }

  public function delete(int $id): void
  {
    $this->repository->delete($id);
  }

  public function getTodoById(int $id): ?EntityTodo
  {
    return $this->repository->findById($id);
  }
}
