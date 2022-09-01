<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoteItem>
 */
class NoteItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'note_id'  => Note::factory(),
            'item_id'  => Item::factory(),
            'name'     => fake()->sentence(3, true),
            'sku'      => fake()->unique()->ean8(),
            'quantity' => 1,
            'price'    => fake()->unique()->numberBetween(100,2000),
        ];
    }
}
