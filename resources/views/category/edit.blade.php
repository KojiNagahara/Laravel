@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">カテゴリー編集</div>

                    <div class="card-body">
                        <form method="POST" action="/category/{{ $category->id }}" class="form-horizontal">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">カテゴリ名</label>
                                <input type="text" name="name" placeholder="カテゴリ名" class="col-md-8" value="{{ $category->name }}">
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
