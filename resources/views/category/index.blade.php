@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">カテゴリー一覧</div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover table-condensed">
                            <tr>
                                <th></th>
                                <th>カテゴリ名</th>
                                <th></th>
                            </tr>
                           @foreach($categories as $category)
                                <tr>
                                    <td><a href="category/{{  $category->id }}/edit" class="btn btn-primary">カテゴリ編集</a></td>
                                    <td>{{  $category->name }}</td>
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

                        <a href="category/create" class="btn btn-primary">新規カテゴリ追加</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
