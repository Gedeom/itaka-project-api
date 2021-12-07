<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichaSituacaoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path('sqls'.DIRECTORY_SEPARATOR.'FichaSituacao.sql'));

        DB::unprepared($sql);
    }
}
