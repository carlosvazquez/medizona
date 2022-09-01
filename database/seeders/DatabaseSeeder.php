<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $productNames = [
            'Synthroid (levothyroxine)',
            'Crestor (rosuvastatin)',
            'Ventolin HFA (albuterol)',
            'Nexium (esomeprazole)',
            'Advair Diskus (fluticasone)',
            'Lantus Solostar (insulin glargine)',
            'Vyvanse (lisdexamfetamine)',
            'Lyrica (pregabalin)',
            'Spiriva Handihaler (tiotropium)',
            'Januvia (sitagliptin)',
            'Humira (adalimumab)',
            'Abilify (aripiprazole)',
            'Sovaldi (sofosbuvir)',
            'Crestor (rosuvastatin)',
            'Enbrel (etanercept)',
            'Harvoni (ledipasvir and sofosbuvir)',
            'Nexium (esomeprazole)',
            'Advair Diskus (fluticasone)',
            'Lantus Solostar (insulin glargine)',
            'Remicade (infliximab)',
        ];
    }
}
