@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">スキル編集</div>

                    <div class="card-body">
                        <p>カテゴリ：{{ $category->name }}</p>
                        <form method="POST" action="/answer/{{ $category->id }}/{{ $answer->id }}" class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="level">レベル</label>
                                <input type="text" name="level" placeholder="レベル数値（整数）" class="col-md-8" required value="{{ $answer->level }}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="description">説明</label>
                                <input type="text" name="description" placeholder="レベルの説明" class="col-md-8" required value="{{ $answer->description }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">変更</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
