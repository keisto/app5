<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
  // public function __construct()	{
  //   // User Must Be Logged in
  //   $this->middleware('auth');
  // }

  public function index()
  {
    $tasks = Task::active()->get();
    return view('task.index', compact('tasks'));
  }

  public function create()
  {
    return view('task.create');
  }

  public function store()
  {
    $active = 0;
    if(request('active')) {
      $active = 1;
    } else {
      $active = 0;
    }
    $task = Task::create([
      // "name" => request('name'),
      "active" => $active
    ]);
    $tasks = Task::active()->get();
    return view('task.index', compact('tasks'));
  }

  public function update()
  {
    # code...
  }

  public function show()
  {
    # code...
  }
}
