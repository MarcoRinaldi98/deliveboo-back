<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_data = config('db.user');

        foreach ($user_data as $data) {
            $newUser = new User();

                $newUser->name = $data["name"];
                $newUser->surname = $data["surname"];
                $newUser->email = $data["email"];
                $newUser->password = $data["password"];

            $newUser->save();
        }
    }
}
