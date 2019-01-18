@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">チーム一覧</div>

                    <div class="card-body">
                        @if($teams->count() > 0)
                        <table class="table table-bordered table-hover table-condensed table-sm">
                            <tr class="table-primary">
                                <th></th>
                                <th>チーム名</th>
                                <th>説明</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($teams as $team)
                                <tr>
                                    <td><a href="/team/{{ $team->id }}" class="btn btn-primary">チーム情報詳細</a></td>
                                    <td class="align-middle">{{ $team->name }}</td>
                                    <td class="align-middle">{{ $team->description }}</td>
                                    <td><a href="#" class="btn btn-primary">メンバー一覧</a></td>
                                    <td><a href="#" class="btn btn-primary">プロジェクト一覧</a></td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            <div class="mb-2">所属しているチームはまだありません。</div>
                        @endif

                        <a href="/team/create" class="btn btn-primary">新規チーム追加</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
