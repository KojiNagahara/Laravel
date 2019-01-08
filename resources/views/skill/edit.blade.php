@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">スキル編集</div>

                    <div class="card-body">
                        <p>カテゴリ：{{ $category->name }}</p>
                        <form method="POST" action="/skill/{{ $category->id }}/{{ $skill->id }}" class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">スキル名</label>
                                <input type="text" name="name" placeholder="スキル名" class="col-md-8" value="{{ $skill->name }}">
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
