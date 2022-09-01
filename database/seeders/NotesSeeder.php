<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allItems = Item::all();

        $range = range(1,10);

        foreach($range as $_) {

            $products = $allItems->take(random_int(1,10));

            $customer = Customer::inRandomOrder()->first();

            foreach($products as $product) {
                $note = Note::create([
                    'customer_id' => $customer->id,
                    'date'        => now()
                ]);

                $note->items()->createMany($this->parseData($products->toArray()));
            }
        }
    }
    
    private function parseData($data):array
    {
        return array_map(function($item) {
            return [
                "item_id"  => $item['id'],
                "name"     => $item['name'],
                "sku"      => $item['sku'],
                "price"    => $item['price'],
                "quantity" => random_int(1,10)
            ];
        }, $data);
    }
}
