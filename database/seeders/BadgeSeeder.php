<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('badges')->insert([
            [
                'badgeName' => 'Islamic Finance Explorer',
                'badgeDesc' => 'You got the basics down! Keep exploring to become a true Islamic Finance pro!',
                'badgeIcon' => 'images/badges/islamic_finance_explorer.png',
                'scoreThreshold' => 7,
            ],
            [
                'badgeName' => 'Shariah Police',
                'badgeDesc' => 'Congrats! You can spot Halal vs Haram industries like a pro! Invest smart, stay ethical, and always follow the Shariah code!.',
                'badgeIcon' => 'images/badges/shariah_police.png',
                'scoreThreshold' => 7,
            ],
            [
                'badgeName' => 'Banking Ustaz',
                'badgeDesc' => 'MashaAllah! Whether savings, loans, or gifts, you are ready to handle Islamic banking like a boss!',
                'badgeIcon' => 'images/badges/banking_ustaz.png',
                'scoreThreshold' => 4,
            ],
            [
                'badgeName' => 'Takaful Team Player',
                'badgeDesc' => 'High five! You get that Takaful is all about sharing risks, staying halal, and looking out for others. Keep spreading the cooperative vibes!',
                'badgeIcon' => 'images/badges/takaful_team_player.png',
                'scoreThreshold' => 7,
            ],
            [
                'badgeName' => 'Halal Investor',
                'badgeDesc' => 'Your money grows safely, ethically, and blessedly, Alhamdulillah!',
                'badgeIcon' => 'images/badges/halal_investor.png',
                'scoreThreshold' => 4,
            ],
            [
                'badgeName' => 'Shariah Planner',
                'badgeDesc' => 'MashaAllah! You handle Zakat, Hibah, Tawarruq, and inheritance like a pro! Your finances are smart, ethical, and peaceful!',
                'badgeIcon' => 'images/badges/shariah_planner.png',
                'scoreThreshold' => 7,
            ],
        ]);
    }
}
