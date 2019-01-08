<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
        Category::create([
            'name'=>request('name')
        ]);

        return redirect('category');
    }

    public function show(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $category->update(request(['name']));

        return redirect('category');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('category');
    }
}
