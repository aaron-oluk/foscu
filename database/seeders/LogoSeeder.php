<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, clear existing logos
        \App\Models\Logo::truncate();
        
        $logos = [
            [
                'partner_name' => 'College of Agricultural and Environmental Sciences',
                'website_url' => 'https://caes.mak.ac.ug',
                'image' => 'images/CAES.png',
                'status' => 'active',
                'display_order' => 1,
            ],
            [
                'partner_name' => 'College of Health Sciences',
                'website_url' => 'https://chs.mak.ac.ug',
                'image' => 'images/CHS.png',
                'status' => 'active',
                'display_order' => 2,
            ],
            [
                'partner_name' => 'Caritas Uganda',
                'website_url' => 'https://caritas.go.ug',
                'image' => 'images/caritus.png',
                'status' => 'active',
                'display_order' => 3,
            ],
            [
                'partner_name' => 'Kulika Uganda',
                'website_url' => 'https://kulika.org',
                'image' => 'images/kulika.png',
                'status' => 'active',
                'display_order' => 4,
            ],
            [
                'partner_name' => 'GEDA',
                'website_url' => 'https://geda.go.ug',
                'image' => 'images/geda.png',
                'status' => 'active',
                'display_order' => 5,
            ],
            [
                'partner_name' => 'Paramount Seeds',
                'website_url' => 'https://paramountseeds.com',
                'image' => 'images/paramount.png',
                'status' => 'active',
                'display_order' => 6,
            ],
            [
                'partner_name' => 'Sukuma Holdings',
                'website_url' => null,
                'image' => 'images/sukuma.png',
                'status' => 'active',
                'display_order' => 7,
            ],
            [
                'partner_name' => 'Swiss TPH',
                'website_url' => 'https://swisstph.ch',
                'image' => 'images/swisstph.png',
                'status' => 'active',
                'display_order' => 8,
            ],
            [
                'partner_name' => 'UAPE',
                'website_url' => null,
                'image' => 'images/uape.png',
                'status' => 'active',
                'display_order' => 9,
            ],
        ];

        foreach ($logos as $logo) {
            \App\Models\Logo::create($logo);
        }
    }
}
