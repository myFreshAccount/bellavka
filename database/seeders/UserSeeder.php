<?php

namespace Database\Seeders;

use App\Tasks\User\CreateUserByCredentialsTask;
use App\Tasks\User\FindUserByLoginTask;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminLogin = config('authorization.admin_login');
        $adminPassword = config('authorization.admin_password');

        $admin = app(FindUserByLoginTask::class)->run($adminLogin);

        if(is_null($admin)) {
            $admin = app(CreateUserByCredentialsTask::class)->run($adminLogin, $adminPassword);
        }
    }
}
