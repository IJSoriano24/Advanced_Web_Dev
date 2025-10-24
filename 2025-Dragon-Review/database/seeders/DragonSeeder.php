<?php

namespace Database\Seeders;
use App\Models\Dragon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DragonSeeder extends Seeder{
    /**
     * Run the database seeds.
     */

    // inserts initial dragon data into the dragons table for testing and development purposes.
    public function run(): void {
        $currentTimestamp = Carbon::now();

    Dragon::insert([
        
        [
            'type' => 'Night Fury',
            'color' => 'Black',
            'personality' => 'Intelligent and Loyal',
            'image' => 'toothless.png',
            'video_id' => 'nPmIhH775L4',
            'created_at' => '2025-10-01 10:00:00',
            'updated_at' => '2025-10-01 11:00:00'
        ],

        [
            'type' => 'Deadly Nadder',
            'color' => 'Blue',
            'personality' => 'Alert and agile',
            'image' => 'stormfly.png',
            'video_id' => 'HliV3IwsqoA',
            'created_at' => '2025-10-01 10:00:00',
            'updated_at' => '2025-10-01 11:00:00'
        ],

        [
            'type' => 'Monstrous Nightmare',
            'color' => 'Red',
            'personality' => 'Agressive and stubborn ',
            'image' => 'hookfang.png',
            'video_id' => '4bFvBaO6K54',
            'created_at' => '2025-10-01 10:00:00',
            'updated_at' => '2025-10-01 11:00:00'
        ],

        [
            'type' => 'Gronckle',
            'color' => 'Brown with orange and yellow spots',
            'personality' => 'Friendly and affectionate',
            'image' => 'gronkle.png',
            'video_id' => 'lb6vBhR-yL8',
            'created_at' => '2025-10-01 10:00:00',
            'updated_at' => '2025-10-01 11:00:00'
        ],

        [
            'type' => 'Hideous Zippleback',
            'color' => 'Green with purple accents',
            'personality' => 'Cautious and mischevious',
            'image' => 'barfandbelch.png',
            'video_id' => 'vLnoJmdQNFk',
            'created_at' => '2025-10-01 10:00:00',
            'updated_at' => '2025-10-01 11:00:00'
        ],
        
        ]);
    }


       
}
