<?php

use App\Models\Options\Group;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class GroupTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        Group::create([
            'gender' => '1',
            'code' => '3101',
            'name' => 'MIPA',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3102',
            'name' => 'Ilmu Sosial',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3103',
            'name' => 'Ilmu Pendidikan',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3104',
            'name' => 'Teknik',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3105',
            'name' => 'Bahasa & Seni',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3106',
            'name' => 'Ekonomi',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3107',
            'name' => 'Ilmu Olahraga',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3108',
            'name' => 'Psikologi',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3109',
            'name' => 'Swasta',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '3110',
            'name' => 'Ilmu Statistik',
        ]);

        Group::create([
            'gender' => '1',
            'code' => '4101',
            'name' => 'Dewasa',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3201',
            'name' => 'MIPA',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3202',
            'name' => 'Ilmu Sosial',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3203',
            'name' => 'Ilmu Pendidikan',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3204',
            'name' => 'Teknik',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3205',
            'name' => 'Bahasa & Seni',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3206',
            'name' => 'Ekonomi',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3207',
            'name' => 'Ilmu Olahraga',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3208',
            'name' => 'Psikologi',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3209',
            'name' => 'Swasta',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '3210',
            'name' => 'Ilmu Statistik',
        ]);

        Group::create([
            'gender' => '2',
            'code' => '4201',
            'name' => 'Dewasa',
        ]);

        $this->enableForeignKeys();
    }
}
