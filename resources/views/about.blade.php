@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">このアプリケーションについて</div>

                <div class="card-body">
                    <p>これはポートフォリオ用に作成するアプリケーションです。</p>
                    <p>以下の機能を含む予定です。開発が進むごとに取り消し線で実装済みの機能を示します。</p>
                    <ul>
                        <li><s>ユーザ登録および認証</s></li>
                        <li>ユーザのプロファイルの設定/更新</li>
                        <li>プロファイルに含まれるユーザのスキルに関するデータの作成/更新/削除</li>
                        <li>チームの作成/招待/解散</li>
                        <li>プロジェクトの作成/更新/終了</li>
                        <li>タスクの作成/更新/完了</li>
                        <li>タスクの計画ゲームによる見積と自動スケジューリング</li>
                        <li>ユーザおよびチームのタスクの実行予定と実行状況</li>
                    </ul>
                    <p>上記の機能を実現するためこのアプリケーションにはLaravelの以下の技術要素が含まれる予定です。</p>
                    <ul>
                        <li>ユーザ認証</li>
                        <li>複数テーブルに関係するCRUD操作とトランザクション</li>
                        <li>メール通知</li>
                        <li>カスタムイベント</li>
                    </ul>
                    <p>また、将来的に以下の技術要素も組み込む予定です。</p>
                    <ul>
                        <li>ソーシャル連携</li>
                        <li>Vue.jsによるコンポーネント化されたUI</li>
                        <li>Slack連携</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
