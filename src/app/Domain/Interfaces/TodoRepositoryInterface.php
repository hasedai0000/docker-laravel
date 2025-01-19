<?php

namespace App\Domain\Interfaces;

use App\Domain\Entity\Todo as EntityTodo;

interface TodoRepositoryInterface
{
  public function findAll(): array;
  public function findById(int $id): ?EntityTodo;
  public function findByUserId(int $user_id): ?EntityTodo;
  public function store(EntityTodo $todo): int;
  public function update(EntityTodo $todo): void;
  public function delete(int $id): void;
}
