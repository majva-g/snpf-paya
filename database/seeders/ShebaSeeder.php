<?php

namespace Database\Seeders;


use Domain\Sheba\Models\Sheba as ModelsSheba;
use Illuminate\Database\Seeder;

class ShebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsSheba::factory()->count(10)->create();
    }
}
