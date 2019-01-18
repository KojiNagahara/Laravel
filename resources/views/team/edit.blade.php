@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">チーム編集</div>

                    <div class="card-body">
                        <form method="POST" action="/team/{{ $team->id }}" class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">チーム名</label>
                                <input type="text" name="name" placeholder="チーム名" class="col-md-8" value="{{ $team->name }}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="description">チームの説明</label>
                                <input type="text" name="description" placeholder="チームの説明" class="col-md-8" value="{{ $team->description }}">
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
