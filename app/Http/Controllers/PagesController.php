<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * アプリケーションのトップページを表示する。
     *
     * @return 最初の画面を表すViewオブジェクト
     */
    public function home() {
        return view('welcome');
    }

    /**
     * アプリケーションの説明を記述したページを表示する。
     *
     * @return 説明画面を表すViewオブジェクト
     */
    public function about()
    {
        return view('about');
    }
}
