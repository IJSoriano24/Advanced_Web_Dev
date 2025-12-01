<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Dragon;
use App\Models\Viking;

class VikingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
         // Get the current timestamp for created_at and updated_at fields

 // Define the Vikings to seed
        $vikings = [
            [
                'image' => 'hiccup.png',
                'name'  => 'Hiccup Horrendous Haddock III',
                'bio'   => 'The inventive and clever son of Stoick the Vast, Hiccup becomes the first Viking to befriend a dragon—Toothless—and ultimately becomes the leader who unites humans and dragons.'
            ],
            [
                'image' => 'astrid.png',
                'name'  => 'Astrid Hofferson',
                'bio'   => 'A fierce, disciplined warrior and one of the most skilled dragon riders in Berk. Astrid is loyal, courageous, and serves as Hiccup’s closest partner and eventual love interest.'
            ],
            [
                'image' => 'fishlegs.png',
                'name'  => 'Fishlegs Ingerman',
                'bio'   => 'A gentle giant known for his extensive dragon knowledge and calm, analytical mind. Fishlegs is deeply bonded with his dragon Meatlug and loves studying dragon species.'
            ],
            [
                'image' => 'snotlout.png',
                'name'  => 'Snotlout Jorgenson',
                'bio'   => 'Confident and boastful, Snotlout often tries to prove himself as a tough warrior. Despite his ego, he is a brave rider and shows loyalty to his friends when it truly matters.'
            ],
            [
                'image' => 'twins.jpeg',
                'name'  => 'Ruffnut & Tuffnut Thorston',
                'bio'   => 'Chaotic twin siblings known for their reckless behavior and constant bickering. Despite their wild antics, they are skilled dragon riders and surprisingly effective in battle.'
            ],
        ];

        // Insert Vikings
        // Create the Viking record in the database
        foreach ($vikings as $vikingData) {
            $createdViking = Viking::create([
                ...$vikingData, // Spread operator inserts name, image, bio
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]);

            // Attach Dragons to Vikings based on predefined relationships         
            $dragonName = match ($createdViking->name) {
                'Hiccup Horrendous Haddock III' => 'Night Fury',
                'Astrid Hofferson'             => 'Deadly Nadder',
                'Fishlegs Ingerman'            => 'Gronckle',
                'Snotlout Jorgenson'           => 'Monstrous Nightmare',
                'Ruffnut & Tuffnut Thorston'   => 'Hideous Zippleback',
                default                        => null
            };

            
            // Attach the dragon if it exists in the dragons table

            if ($dragonName) {

                // Find dragon by type
                $dragon = Dragon::where('type', $dragonName)->first();

                 // Many-to-many pivot table attach
                if ($dragon) {
                    $createdViking->dragons()->attach($dragon->id);
                }
            }
        }
    }
}
