<?php

namespace App\Http\Controllers;

use App\Service\TodoService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends Controller
{
    private $service;

    public function __construct(
        TodoService $service
    ) {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getTodos());
    }

    public function register(Request $request)
    {
        $id = $this->service->register($request->user_id, $request->title, $request->content);
        return response('登録しました。', Response::HTTP_CREATED)->header('Location', 'api/todo/' . $id);
    }

    public function update(Request $request, int $id)
    {
        $this->service->update($id, $request->title, $request->content, $request->is_done, $request->is_deleted);
        return response('更新しました。', Response::HTTP_OK);
    }

    public function delete(int $id)
    {
        $this->service->delete($id);
        return response('削除しました。', Response::HTTP_NO_CONTENT);
    }

    public function show(int $id)
    {
        $todo = $this->service->getTodoById($id);
        if ($todo === null) {
            return response('Todoが見つかりません。', Response::HTTP_NOT_FOUND);
        }
        return response()->json($todo);
    }
}
