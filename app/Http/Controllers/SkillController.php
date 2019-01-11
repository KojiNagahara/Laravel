<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Category;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $skills = Skill::where('category_id', $category->id)->get();

        return view('skill.index', compact('category', 'skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('skill.create', compact('category'));
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
        Skill::create([
            'name' => $request->name,
            'category_id' => $category->id,
        ]);

        return redirect('skill/'.$category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Skill $skill)
    {
        return view('skill.edit', compact('category', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Skill $skill)
    {
        $skill->update([
            'name' => $request->name,
        ]);

        return redirect('skill/'.$category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @param  \App\Skill $skill
     * @return \Illuminate\Http\Response
     * @throws \Exception 削除時に発生した例外
     */
    public function destroy(Category $category, Skill $skill)
    {
        $skill->delete();

        return redirect('skill/'.$category->id);
    }
}
