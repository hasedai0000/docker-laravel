<?php

namespace App\Domain\Entity;

class Todo implements \JsonSerializable
{
  protected $id;
  protected $user_id;
  protected $title;
  protected $content;
  protected $is_done;
  protected $is_deleted;

  public function __construct(
    ?int $id,
    ?int $user_id,
    ?string $title,
    ?string $content,
    ?bool $is_done,
    ?bool $is_deleted
  ) {
    $this->id = $id;
    $this->user_id = $user_id;
    $this->title = $title;
    $this->content = $content;
    $this->is_done = $is_done;
    $this->is_deleted = $is_deleted;
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getUserId(): ?int
  {
    return $this->user_id;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function getIsDone(): ?bool
  {
    return $this->is_done;
  }

  public function getIsDeleted(): ?bool
  {
    return $this->is_deleted;
  }

  public function setTitle(string $title): void
  {
    $this->title = $title;
  }

  public function setContent(string $content): void
  {
    $this->content = $content;
  }

  public function setIsDone(bool $is_done): void
  {
    $this->is_done = $is_done;
  }

  public function setIsDeleted(bool $is_deleted): void
  {
    $this->is_deleted = $is_deleted;
  }

  // APIの戻り値をjsonにするためのメソッド(ResourceクラスでもOK)
  public function jsonSerialize(): array
  {
    return [
      'id' => $this->getId(),
      'user_id' => $this->getUserId(),
      'title' => $this->getTitle(),
      'content' => $this->getContent(),
      'is_done' => $this->getIsDone(),
      'is_deleted' => $this->getIsDeleted(),
    ];
  }
}
