<?php

use App\Models\Options\Month;
use Illuminate\Database\Seeder;

/**
 * Class MonthTableSeeder
 */
class MonthTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        Month::create([
            'month' => 'Januari',
        ]);

        Month::create([
            'month' => 'Februari',
        ]);

        Month::create([
            'month' => 'Maret',
        ]);

        Month::create([
            'month' => 'April',
        ]);

        Month::create([
            'month' => 'Mei',
        ]);

        Month::create([
            'month' => 'Juni',
        ]);

        Month::create([
            'month' => 'Juli',
        ]);

        Month::create([
            'month' => 'Agustus',
        ]);

        Month::create([
            'month' => 'September',
        ]);

        Month::create([
            'month' => 'Oktober',
        ]);

        Month::create([
            'month' => 'November',
        ]);

        Month::create([
            'month' => 'Desember',
        ]);

        $this->enableForeignKeys();
    }
}
