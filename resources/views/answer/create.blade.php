@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">新規スキル作成</div>

                    <div class="card-body">
                        <p>カテゴリ：{{ $category->name }}</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="/answer/{{ $category->id }}" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="level">レベル</label>
                                <input type="text" name="level" placeholder="レベル数値（整数）" class="col-md-8" required>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="description">説明</label>
                                <input type="text" name="description" placeholder="レベルの説明" class="col-md-8" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">追加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
