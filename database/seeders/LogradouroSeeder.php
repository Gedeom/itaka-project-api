<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogradouroSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path('sqls'.DIRECTORY_SEPARATOR.'Logradouro.sql'));

        DB::unprepared("set global max_allowed_packet=104857600");
        DB::unprepared($sql);
    }
}
