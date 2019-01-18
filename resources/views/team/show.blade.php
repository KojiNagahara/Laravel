@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">チーム詳細</div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover table-condensed table-sm">
                            <tr class="table-primary">
                                <th>チーム名</th>
                                <th>説明</th>
                            </tr>
                            <tr>
                                <td class="align-middle">{{  $team->name }}</td>
                                <td class="align-middle">{{  $team->description }}</td>
                            </tr>
                        </table>

                        <div>
                            @if ($team->isAdmin(Auth::user()))
                                <div class="float-left mb-2">
                                    <a href="/team/{{  $team->id }}/edit" class="btn btn-primary">チーム情報編集</a>
                                </div>

                                <div class="float-right mb-2">
                                    <form method="POST" action="/team/{{ $team->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">チーム解散</button>
                                    </form>
                                </div>
                            @endif
                        </div>

                        <table class="table table-bordered table-hover table-condensed table-sm">
                            <tr class="table-primary">
                                <th>ニックネーム</th>
                                <th>状態</th>
                                <th>管理者権限の有無</th>
                            </tr>
                            @foreach($team->members as $member)
                                <tr>
                                    <td class="align-middle">{{  $member->name }}</td>
                                    <td class="align-middle">{{  $member->member->status }}</td>
                                    <td class="align-middle">{{  $member->member->isAdmin }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="mb-2">
                            @if ($team->isAdmin(Auth::user()))
                                <div class="float-left">
                                    <a href="/team/{{  $team->id }}" class="btn btn-primary">メンバー追加</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
