<?php

namespace Database\Seeders;

use App\Models\Mesure;
use Illuminate\Database\Seeder;

class MesureSeeder extends Seeder
{

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
    {
        Mesure::factory()
            ->count(50)
            ->create();
    }
}
