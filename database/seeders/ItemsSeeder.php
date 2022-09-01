<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name'  => 'Synthroid (levothyroxine)',
                'sku'   => 'SYNL',
                'price' => 230,
            ],
            [
                'name'  => 'Crestor (rosuvastatin)',
                'sku'   => 'CRIN',
                'price' => 1200,
            ],

            [
                'name'  => 'Ventolin HFA (albuterol)',
                'sku'   => 'VNTH',
                'price' => 300,
            ],
            [
                'name'  => 'Nexium (esomeprazole)',
                'sku'   => 'NEXZ',
                'price' => 1090,
            ],
            [
                'name'  => 'Advair Diskus (fluticasone)',
                'sku'   => 'ADDI',
                'price' => 430,
            ],
            [
                'name'  => 'Lantus Solostar (insulin glargine)',
                'sku'   => 'LASO',
                'price' => 610,
            ],
            [
                'name'  => 'Vyvanse (lisdexamfetamine)',
                'sku'   => 'VYVA',
                'price' => 100,
            ],
            [
                'name'  => 'Lyrica (pregabalin)',
                'sku'   => 'LYRC',
                'price' => 340,
            ],
            [
                'name'  => 'Spiriva Handihaler (tiotropium)',
                'sku'   => 'SPVH',
                'price' => 230,
            ],
            [
                'name'  => 'Januvia (sitagliptin)',
                'sku'   => 'JUVI',
                'price' => 230,
            ],
            [
                'name'  => 'Humira (adalimumab)',
                'sku'   => 'HMRA',
                'price' => 230,
            ],
            [
                'name'  => 'Abilify (aripiprazole)',
                'sku'   => 'ALFY',
                'price' => 100,
            ],
            [
                'name'  => 'Sovaldi (sofosbuvir)',
                'sku'   => 'SVAL',
                'price' => 80,
            ],
            [
                'name'  => 'CrestorW (rosuvastatinwws)',
                'sku'   => 'CTRW',
                'price' => 1200,
            ],
            [
                'name'  => 'Enbrel (etanercept)',
                'sku'   => 'ENBR',
                'price' => 500,
            ],
            [
                'name'  => 'Harvoni (ledipasvir and sofosbuvir)',
                'sku'   => 'HONI',
                'price' => 90,
            ],
            [
                'name'  => 'Nexiumpo (esomeprazolePO)',
                'sku'   => 'NEUP',
                'price' => 200,
            ],
            [
                'name'  => 'Advair Diskus OL (fluticasoneol)',
                'sku'   => 'ADKU',
                'price' => 300,
            ],
            [
                'name'  => 'Lantus Solostar LA (insulin glargine la)',
                'sku'   => 'LSOL',
                'price' => 720,
            ],
            [
                'name'  => 'Remicade (infliximab)',
                'sku'   => 'RMCA',
                'price' => 510,
            ],
        ];

        foreach($products as $product) {
            Item::factory()->create([
                'name'  => $product['name'],
                'sku'   => $product['sku'],
                'price' => $product['price'],
            ]);
        }
    }
}
