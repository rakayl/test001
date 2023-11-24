<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

trait SeederTrait
{
    /**
     * truncate tables
     *
     * @param string|array $table
     */

    public function truncate($table)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if (is_array($table)) {
            foreach ($table as $value) {
                DB::table($value)->truncate();
            }
        } else {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
