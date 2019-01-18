@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">ユーザプロファイル</div>

                    <div class="card-body">
                        <div class="row">
                            ニックネーム：{{ $profile->nickname }}
                        </div>
                        <div class="row">
                            アバターファイル：{{ $profile->avatar_filename }}
                        </div>
                        @unless ($profile->skills->isEmpty())
                            <div class="row">
                                保有スキル（未経験以外）：
                            </div>
                            <table class="table table-bordered table-hover table-condensed table-sm">
                                <tr class="table-primary">
                                    <th>保有スキル</th>
                                    <th>スキルレベル</th>
                                    <th>スキルレベル説明</th>
                                </tr>
                                @foreach($profile->skills as $skill)
                                    @if($skill->skillLevel->level > 1)
                                        <tr>
                                            <td class="align-middle">{{  $skill->name }}</td>
                                            <td class="align-middle">{{  $skill->skillLevel->level }}</td>
                                            <td class="align-middle">{{  $skill->skillLevel->description }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        @endunless
                        <div class="row">
                            <a href="/profile/edit" class="btn btn-primary">プロファイル更新</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
