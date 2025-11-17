<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App; // Import the App facade

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // hanya berjalan di environment 'local'
        if (App::environment('local')) {
            $this->command->info('Truncating permohonans table...');
 
            Schema::disableForeignKeyConstraints();
 
            DB::table('permohonans')->truncate();
 
            Schema::enableForeignKeyConstraints();

            $this->command->info('Successfully truncated permohonans table.');
        } else { 
            $this->command->warn('TruncatePermohonansSeeder is for development only. Skipped.');
        }
    }
}