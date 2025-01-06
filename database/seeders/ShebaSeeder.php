<?php

namespace Database\Seeders;


use Domain\Sheba\Models\Sheba;
use Illuminate\Database\Seeder;

class ShebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sheba::factory()->count(10)->create();
    }
}
