<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get();
        return view ('backend.tasks.index',compact('tasks'));
    }

    public function create()
    {
        return view('backend.tasks.create');
    }
}
