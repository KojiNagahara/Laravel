<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 初回ログイン時、プロファイルが設定されていない場合はプロファイルの作成画面に遷移する。
        $user = Auth::user();
        $profile = $user->profile();

        if ($profile === null) {
            return redirect()->action('ProfileController@create');
        } else {
            return view('home');
        }
    }
}
