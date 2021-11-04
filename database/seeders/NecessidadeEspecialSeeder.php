<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NecessidadeEspecialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path('sqls'.DIRECTORY_SEPARATOR.'NecessidadeEspecial.sql'));

        DB::unprepared($sql);
    }
}
