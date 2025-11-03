<?php

namespace Database\Seeders;

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
                'name' => 'Plasma Blast',
                'description' => 'Fires concentrated blasts of blue plasma with extreme accuracy and explosive power.'
            ],

            [
                'name' => 'Spine Shot',
                'description' => 'Can launch a barrage of razor-sharp magnesium spines from her tail with pinpoint accuracy.'
            ],
            
            [
                'name' => 'Spine Shot',
                'description' => 'Can launch a barrage of razor-sharp magnesium spines from her tail with pinpoint accuracy.'
            ],   

            [
                'name' => 'Fie Cloak',
                'description' => 'Can set his entire body ablaze without harm—a signature trait of his species, used for intimidation or combat.'
            ],  

            [
                'name' => 'Lava Blast',
                'description' => 'Fires molten rocks made from regurgitated and chewed stones—a powerful and sticky projectile.'
            ], 
            
            [
                'name' => 'Stealth Attack',
                'description' => 'Can silently release gas and ignite it from a distance for surprise strikes.'
            ],              

            ]);
    }


}
