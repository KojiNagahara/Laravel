@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">カテゴリー一覧</div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover table-condensed table-sm">
                            <tr class="table-primary">
                                <th></th>
                                <th>カテゴリ名</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td><a href="/category/{{  $category->id }}/edit" class="btn btn-primary">カテゴリ編集</a></td>
                                    <td class="align-middle">{{  $category->name }}</td>
                                    <td><a href="/skill/{{ $category->id }}" class="btn btn-primary">スキル一覧</a></td>
                                    <td><a href="/answer/{{ $category->id }}" class="btn btn-primary">スキルレベル回答一覧</a></td>
                                    <td>
                                        <form method="POST" action="/category/{{ $category->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <a href="/category/create" class="btn btn-primary">新規カテゴリ追加</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
