<?php

namespace Database\Seeders;

use App\Models\Good;
use Illuminate\Database\Seeder;

class GoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Good::factory(10000)->create();
    }
}
