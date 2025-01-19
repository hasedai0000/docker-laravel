<?php

namespace App\Http\Requests\Todo;

use App\Models\Todo;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function makeTodo(): Todo
    {
        // バリデーションした値で埋めた Post を取得
        return new Todo($this->validated());
    }
}
