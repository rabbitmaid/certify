<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::firstOrCreate(['name' => 'rabbitmaid', 'slug' => 'rabbitmaid', 'is_active' => true, 'is_default' => true]);

        Template::firstOrCreate(['name' => 'dragonball', 'slug' => 'dragonball', 'is_active' => false]);
    }
}
