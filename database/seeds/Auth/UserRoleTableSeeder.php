<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        User::find(1)->assignRole(config('access.users.admin_role'));
        for ($i = 2;$i<=User::query()->count();$i++){
            User::find($i)->assignRole(config('access.users.default_role'));
        }

        $this->enableForeignKeys();
    }
}
