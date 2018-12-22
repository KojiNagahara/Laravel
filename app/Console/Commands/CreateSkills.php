<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * 個人個人の保有スキルに関する初期データを投入する。
 * @package App\Console\Commands
 */
class CreateSkills extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createskills';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create skill data';

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
            ['name' => 'Java', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ruby', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Javascript', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PHP', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Python', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'C', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'C++', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'C#', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kotlin', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Swift', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            //2:ライブラリ/フレームワーク
            ['name' => 'Spring Boot', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Spring Batch', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'JPA', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'JUnit', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mockito', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ruby on Rails', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'jQuery', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Node.js', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bootstrap', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'AngularJS', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'React', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vue.js', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Symphony', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Laravel', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PHPUnit', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Django', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'NumPy', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'matplotlib', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            //3:DB
            ['name' => 'Oracle', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DB2', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'SQL Server', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MySQL', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MariaDB', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PostgreSQL', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DynamoDB', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MongoDB', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Neo4j', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            //4:ミドルウェア運用
            ['name' => 'Apache', 'category_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'nginx', 'category_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tomcat', 'category_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            //5:クラウド環境
            ['name' => 'AWS', 'category_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'GCP', 'category_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Azure', 'category_id' => 5, 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('skills')->insert($data);
    }
}
