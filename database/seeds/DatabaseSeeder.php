<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'failed_jobs',
            'ledgers',
            'jobs',
            'sessions',
        ]);

        // Account Seeder
        $this->call(AuthTableSeeder::class);

        // Options Seeder
        $this->call(GroupTableSeeder::class);
        $this->call(MonthTableSeeder::class);
        $this->call(YearTableSeeder::class);

        Model::reguard();
    }
}
