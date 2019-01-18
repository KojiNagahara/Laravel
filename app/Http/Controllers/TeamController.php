<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
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

    public function index()
    {
        // 自身がメンバーであり、かつ活動中のチームの情報を表示
        $user = Auth::user();
        $teams = $user->activeTeams;

        return view('team.index', compact('teams'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        // チームを作成し、自身を最初の管理者メンバーとして設定する
        $user = Auth::user();
        $newTeam = Team::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $newTeam->members()->attach($user->id,
            ['isAdmin' => true, 'status' => Team::JOINED]);

        return redirect('team');
    }

    public function show(Team $team)
    {
        return view('team.show', compact('team'));
    }

    public function edit(Team $team)
    {
        return view('team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        // チーム情報の更新
        $user = Auth::user();
        if ($team->isAdmin($user)) {
            $team->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return redirect('team');
        } else {
            // チームの管理者権限を持っていない場合はabort
            abort(403);
        }

    }

    public function destroy(Team $team)
    {
        $user = Auth::user();
        if ($team->isAdmin($user)) {
            $team->update([
                'isActive' => false,
            ]);

            return redirect('team');
        } else {
            // チームの管理者権限を持っていない場合はabort
            abort(403);
        }
    }
}
