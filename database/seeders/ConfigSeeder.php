<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate([
            'config_name' => 'APP_NAME',
            'value' => 'SMK_PENERBANGAN'
        ]);

        Setting::updateOrCreate([
            'config_name' => 'ALAMAT_SEKOLAH',
            'value' => 'John Doe, Jane Doe'
        ]);

        Setting::updateOrCreate([
            'config_name' => 'INSTAGRAM_URL',
            'value' => '#'
        ]);

        Setting::updateOrCreate([
            'config_name' => 'FACEBOOK_URL',
            'value' => '#'
        ]);
        
        Setting::updateOrCreate([
            'config_name' => 'NOMOR_HANDPHONE',
            'value' => '089-999-1234'
        ]);

        Setting::updateOrCreate([
            'config_name' => 'LSP_LINK',
            'value' => '#'
        ]);

        Setting::updateOrCreate([
            'config_name' => 'BNSP_LICENSE_NUMBER',
            'value' => '-'
        ]);

        Setting::updateOrCreate([
            'config_name' => 'ISO_9001:2015_CERT_NO',
            'value' => '-'
        ]);
    }
}
