<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // モデルに関連付けるテーブル
    protected $table = 'todos';

    // テーブルに関連付ける主キー
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'content',
        'is_completed',
        'is_deleted',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'title' => 'string',
            'content' => 'string',
            'is_completed' => 'boolean',
            'is_deleted' => 'boolean',
        ];
    }
}
