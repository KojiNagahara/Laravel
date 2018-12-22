<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * 質問カテゴリーに対する回答データの初期値を投入する。
 * @package App\Console\Commands
 */
class CreateAnswers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createanswers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default answer for categories';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now();
        $data = [
            //1:プログラミング言語
            ['level' => 1, 'description' => '未経験', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['level' => 2, 'description' => '文法知識はある', 'category_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 3, 'description' => '独力でのアプリケーション作成経験あり', 'category_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 4, 'description' => '独力でのアーキテクチャ構成/運用経験あり', 'category_id' => 1,  'created_at' => $now, 'updated_at' => $now],
            //2:ライブラリ/フレームワーク
            ['level' => 1, 'description' => '未経験', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['level' => 2, 'description' => '文法知識はある', 'category_id' => 2,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 3, 'description' => '独力でのアプリケーション作成経験あり', 'category_id' => 2,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 4, 'description' => '独力でのアーキテクチャ構成/運用経験あり', 'category_id' => 2,  'created_at' => $now, 'updated_at' => $now],
            //3:DB
            ['level' => 1, 'description' => '未経験', 'category_id' => 3,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 2, 'description' => 'クエリの実装経験がある', 'category_id' => 3,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 3, 'description' => '論理設計/物理設計をしたことがある', 'category_id' => 3,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 4, 'description' => 'チューニングをしたことがある', 'category_id' => 3,  'created_at' => $now, 'updated_at' => $now],
            //4:ミドルウェア運用
            ['level' => 1, 'description' => '未経験', 'category_id' => 4,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 2, 'description' => 'インストールしたことがある', 'category_id' => 4,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 3, 'description' => '実運用をしたことがある', 'category_id' => 4,  'created_at' => $now, 'updated_at' => $now],
            //5:クラウド環境
            ['level' => 1, 'description' => '未経験', 'category_id' => 5,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 2, 'description' => '個人的に試験運用をしたことがある', 'category_id' => 5,  'created_at' => $now, 'updated_at' => $now],
            ['level' => 3, 'description' => '業務で運用をしたことがある', 'category_id' => 5,  'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('answers')->insert($data);
    }
}
