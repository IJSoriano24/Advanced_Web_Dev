<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Dragon;
use App\Models\Viking;

class DragonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        // -----------------------------
        // Insert Dragons
        // -----------------------------
        $dragons = [
            [
                'type' => 'Night Fury',
                'color' => 'Black',
                'personality' => 'Intelligent and Loyal',
                'image' => 'toothless.png',
                'video_id' => 'nPmIhH775L4',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'type' => 'Deadly Nadder',
                'color' => 'Blue',
                'personality' => 'Alert and agile',
                'image' => 'stormfly.png',
                'video_id' => 'HliV3IwsqoA',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'type' => 'Monstrous Nightmare',
                'color' => 'Red',
                'personality' => 'Aggressive and stubborn',
                'image' => 'hookfang.png',
                'video_id' => '4bFvBaO6K54',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'type' => 'Gronckle',
                'color' => 'Brown with orange and yellow spots',
                'personality' => 'Friendly and affectionate',
                'image' => 'gronkle.png',
                'video_id' => 'lb6vBhR-yL8',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'type' => 'Hideous Zippleback',
                'color' => 'Green with purple accents',
                'personality' => 'Cautious and mischievous',
                'image' => 'barfandbelch.png',
                'video_id' => 'vLnoJmdQNFk',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
        ];

        foreach ($dragons as $dragonData) {

            // Create dragon
            $dragon = Dragon::create($dragonData);

           
            $vikingIds = Viking::inRandomOrder()->take(2)->pluck('id');

            $dragon->vikings()->attach($vikingIds);
        }
    }
}
