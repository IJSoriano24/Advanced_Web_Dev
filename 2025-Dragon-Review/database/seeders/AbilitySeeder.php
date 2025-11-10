<?php

namespace Database\Seeders;
use App\Models\Ability;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        
        Ability::insert([

            [
                'dragon_id' => '1',
                'name' => 'Plasma Blast',
                'description' => 'Instead of breathing fire like other dragons, Toothless shoots a precise, explosive blast of purple-colored, lightning-like energy.'
            ],
           
            [
                'dragon_id' => '2',
                'name' => 'Spine Shot',
                'description' => 'Can launch a barrage of razor-sharp magnesium spines from her tail with pinpoint accuracy.'
            ],  
 
            [
                'dragon_id' => '3',
                'name' => 'Fie Cloak',
                'description' => 'Can set his entire body ablaze without harm—a signature trait of his species, used for intimidation or combat.'
            ],  
 
            [
                'dragon_id' => '4',
                'name' => 'Lava Blast',
                'description' => 'Fires molten rocks made from regurgitated and chewed stones—a powerful and sticky projectile.'
            ],
           
            [
                'dragon_id' => '5',
                'name' => 'Stealth Attack',
                'description' => 'Can silently release gas and ignite it from a distance for surprise strikes.'
            ],    

        ]);
    }
}
