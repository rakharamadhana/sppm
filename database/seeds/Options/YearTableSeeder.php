<?php

use App\Models\Options\Year;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class YearTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        Year::create([
            'year' => '2020',
        ]);

        Year::create([
            'year' => '2021',
        ]);

        Year::create([
            'year' => '2022',
        ]);

        Year::create([
            'year' => '2023',
        ]);

        Year::create([
            'year' => '2024',
        ]);

        $this->enableForeignKeys();
    }
}
