<?php

namespace Database\Seeders;

use App\Models\Socials;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socials = [
            [
                'name' => 'LinkedIn',
                'link' => 'https://www.linkedin.com/in/yourprofile',
            ],
            [
                'name' => 'Instagram',
                'link' => 'https://www.instagram.com/bbane03/',
            ],
        ];
        foreach ($socials as $social) {
           Socials::updateOrCreate([
                'name' => $social['name'],
                'link' => $social['link'],
            ]);
        }
    }
}
