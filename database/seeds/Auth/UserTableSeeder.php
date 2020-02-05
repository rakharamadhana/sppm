<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Default',
            'last_name' => 'User',
            'email' => 'user@user.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Rakha',
            'last_name' => 'Ramadhana',
            'email' => 'rakha@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'MIPA',
            'last_name' => 'Bendahara Pria',
            'email' => '3101@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ilmu Sosial',
            'last_name' => 'Bendahara Pria',
            'email' => '3102@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ilmu Pendidikan',
            'last_name' => 'Bendahara Pria',
            'email' => '3103@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Teknik',
            'last_name' => 'Bendahara Pria',
            'email' => '3104@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Bahasa & Seni',
            'last_name' => 'Bendahara Pria',
            'email' => '3105@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ekonomi',
            'last_name' => 'Bendahara Pria',
            'email' => '3106@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ilmu Olahraga',
            'last_name' => 'Bendahara Pria',
            'email' => '3107@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Psikologi',
            'last_name' => 'Bendahara Pria',
            'email' => '3108@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Swasta',
            'last_name' => 'Bendahara Pria',
            'email' => '3109@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ilmu Statistik',
            'last_name' => 'Bendahara Pria',
            'email' => '3110@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Dewasa',
            'last_name' => 'Bendahara Pria',
            'email' => '4101@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'MIPA',
            'last_name' => 'Bendahara Wanita',
            'email' => '3201@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ilmu Sosial',
            'last_name' => 'Bendahara Wanita',
            'email' => '3202@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ilmu Pendidikan',
            'last_name' => 'Bendahara Wanita',
            'email' => '3203@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Teknik',
            'last_name' => 'Bendahara Wanita',
            'email' => '3204@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Bahasa & Seni',
            'last_name' => 'Bendahara Wanita',
            'email' => '3205@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ekonomi',
            'last_name' => 'Bendahara Wanita',
            'email' => '3206@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ilmu Olahraga',
            'last_name' => 'Bendahara Wanita',
            'email' => '3207@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Psikologi',
            'last_name' => 'Bendahara Wanita',
            'email' => '3208@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Swasta',
            'last_name' => 'Bendahara Wanita',
            'email' => '3209@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Ilmu Statistik',
            'last_name' => 'Bendahara Wanita',
            'email' => '3210@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Dewasa',
            'last_name' => 'Bendahara Wanita',
            'email' => '4201@pemimpinmuda.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        $this->enableForeignKeys();
    }
}
