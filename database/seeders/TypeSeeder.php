<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_data = config('db.types');

        foreach ($type_data as $data) {
            $newType = new Type();

                $newType->name = $data["name"];

            $newType->save();
        }
    }
}
