@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">スキル一覧</div>

                    <div class="card-body">
                        <p>カテゴリ：{{ $category->name }}</p>
                        <table class="table table-bordered table-hover table-condensed">
                            <tr>
                                <th></th>
                                <th>スキル名</th>
                                <th></th>
                            </tr>
                            @foreach($skills as $skill)
                                <tr>
                                    <td><a href="/skill/{{  $category->id }}/{{ $skill->id }}/edit" class="btn btn-primary">スキル編集</a></td>
                                    <td>{{  $skill->name }}</td>
                                    <td>
                                        <form method="POST" action="/skill/{{ $category->id }}/{{ $skill->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <a href="/skill/{{ $category->id }}/create" class="btn btn-primary">新規スキル追加</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
