<?php

namespace App\Http\Controllers;

use App\UseCases\Todo\IndexAction;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(IndexAction $action)
    {
        return $action();
    }
}
