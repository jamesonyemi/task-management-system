<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();
        $faker = Faker\Factory::create();

            for($i = 0; $i < 1000; $i++) {
                App\User::create([
                    'username' => $faker->userName,
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => password_hash('secret', PASSWORD_ARGON2I),
                    'remember_token' => str_shuffle(str_random(10)).gmdate('Y-m-d h:s:i')
                ]);

        }
    Model::reguard();
    }

}
