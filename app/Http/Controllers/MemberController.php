<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
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

    public function index(Team $team)
    {
        // 表示用に自分以外のユーザのProfileをSkill込みでEagerフェッチしたリストを渡す
        $user = Auth::user();
        $users = User::with(['profile.skills'])->whereNotIn('id', [$user->id]);
        dd($users);

        return view('member.index', compact('users', 'team'));
    }

    public function find(Team $team)
    {


        return view('member.index', compact('users', 'team'));
    }

}
