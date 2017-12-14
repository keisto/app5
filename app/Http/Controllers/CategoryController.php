<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::active()->get();
    return view('category.index', compact('categories'));
  }

  public function create()
  {
    return view('category.create');
  }

  public function store()
  {
    $active = false;
    if(request('active')) {
      $active = true;
    } else {
      $active = false;
    }

    $labels = false;
    if(request('labels')) {
      $labels = true;
    } else {
      $labels = false;
    }
    $category = Category::create([
      "name" => request('name'),
      "active" => $active,
      "labels" => $labels
    ]);
    return redirect('category');
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
