<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Setting;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Stat;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'),
            ]
        );

        // Settings
        $settings = [
            'site_name' => 'SKY PORTFOLIO',
            'hero_title' => 'I AM SKY',
            'hero_subtitle' => 'WELCOME TO MY WORLD',
            'hero_profession' => 'Full Stack Developer',
            'hero_description' => 'I am a passionate developer with experience in building modern web applications using Laravel, React, and other cutting-edge technologies.',
            'email' => 'sky@example.com',
            'phone' => '+255 123 456 789',
            'contact_description' => 'I am available for freelance work. Connect with me via phone call or email.',
        ];

        foreach ($settings as $key => $value) {
            Setting::create(['key' => $key, 'value' => $value]);
        }

        // Services
        Service::create([
            'title' => 'Web Development',
            'description' => 'Building responsive and high-performance websites using modern frameworks.',
            'icon' => 'fas fa-code'
        ]);
        Service::create([
            'title' => 'Mobile Apps',
            'description' => 'Creating cross-platform mobile applications for iOS and Android.',
            'icon' => 'fas fa-mobile-alt'
        ]);
        Service::create([
            'title' => 'UI/UX Design',
            'description' => 'Designing intuitive and beautiful user interfaces for better user experience.',
            'icon' => 'fas fa-paint-brush'
        ]);

        // Skills
        Skill::create(['name' => 'Laravel', 'percentage' => 90, 'category' => 'Development']);
        Skill::create(['name' => 'React', 'percentage' => 85, 'category' => 'Development']);
        Skill::create(['name' => 'JavaScript', 'percentage' => 80, 'category' => 'Development']);
        Skill::create(['name' => 'Figma', 'percentage' => 75, 'category' => 'Design']);
        Skill::create(['name' => 'Photoshop', 'percentage' => 70, 'category' => 'Design']);

        // Stats
        Stat::create(['label' => 'Projects Completed', 'value' => '50+']);
        Stat::create(['label' => 'Happy Clients', 'value' => '30+']);
        Stat::create(['label' => 'Years Experience', 'value' => '3+']);
    }
}
