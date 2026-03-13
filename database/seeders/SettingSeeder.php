<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $settings = [
            ['name' => 'company_name', 'value' => 'ESCHOSYS'],
            ['name' => 'matricule_prefix', 'value' => 'ES'],
            ['name' => 'matricule_seperator', 'value' => '-'],
            ['name' => 'authorization', 'value' => 'RC / YAO / 2023 / B /1851 DU 09 OCTOBER 2023'],
            ['name' => 'logo', 'value' => 'images/logo.png'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['name' => $setting['name']],
                ['value' => $setting['value']]
            );
        }
    }
}
