<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Category;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $answers = Answer::where('category_id', $category->id)->get();

        return view('answer.index', compact('category', 'answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('answer.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        Answer::create([
            'level' => $request->level,
            'description' => $request->description,
            'category_id' => $category->id,
        ]);

        return redirect('answer/'.$category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Answer $answer)
    {
        return view('answer.edit', compact('category', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Answer $answer)
    {
        $answer->update([
            'level' => $request->level,
            'description' => $request->description,
        ]);

        return redirect('answer/'.$category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @param  \App\Answer $answer
     * @return \Illuminate\Http\Response
     * @throws \Exception 削除時に発生する例外
     */
    public function destroy(Category $category, Answer $answer)
    {
        $answer->delete();

        return redirect('answer/'.$category->id);
    }
}
