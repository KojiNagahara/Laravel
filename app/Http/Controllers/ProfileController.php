<?php

namespace App\Http\Controllers;

use App\Category;
use App\Profile;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile();

        if ($profile === null) {
            return $this->create();
        } else {
            return view('profile.index', compact('profile'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 画面作成用のカテゴリー、カテゴリー内のスキル、カテゴリー共通の回答内容をEagerローディングで取得
        $categories = Category::with(['skills', 'answers'])->get();
        return view('profile.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // プロファイルを作成する
        $user = Auth::user();
        $newProfile = Profile::create([
            'user_id' => $user->id,
            'nickname' => $request->nickname,
            'avatar_filename' => $request->avatar_filename,
        ]);
        // 作成したプロファイルに関連するスキルを設定する
        foreach ($request->skillLevel as $skillId => $level) {
            $relatedSkill = Skill::find($skillId);
            $answer = $relatedSkill->category->answers->where('level', $level)->first();
            $newProfile->skills()
                ->attach($skillId, ['level' => $answer->level, 'description' => $answer->description]);
        }

        return redirect('profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile();
        $categories = Category::with(['skills', 'answers'])->get();
        return view('profile.edit', compact('profile','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile();
        $profile->update([
           'nickname' => $request->nickname,
           'avatar_filename' => $request->avatar_filename,
        ]);
        foreach ($request->skillLevel as $skillId => $level) {
            $relatedSkill = Skill::find($skillId);
            $answer = $relatedSkill->category->answers->where('level', $level)->first();
            $profile->skills()
                ->updateExistingPivot($skillId, ['level' => $answer->level, 'description' => $answer->description]);
        }
        return redirect('profile');
    }
}
