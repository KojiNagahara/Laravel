@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">カテゴリに対する回答一覧</div>

                    <div class="card-body">
                        <p>カテゴリ：{{ $category->name }}</p>
                        <table class="table table-bordered table-hover table-condensed">
                            <tr>
                                <th></th>
                                <th>レベル</th>
                                <th>レベルの説明</th>
                                <th></th>
                            </tr>
                            @foreach($answers as $answer)
                                <tr>
                                    <td><a href="/answer/{{ $category->id }}/{{ $answer->id }}/edit" class="btn btn-primary">回答編集</a></td>
                                    <td>{{  $answer->level }}</td>
                                    <td>{{  $answer->description }}</td>
                                    <td>
                                        <form method="POST" action="/answer/{{ $category->id }}/{{ $answer->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <a href="/answer/{{ $category->id }}/create" class="btn btn-primary">回答追加</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
