<?php

namespace Database\Factories;

use App\Models\RoomGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->colorName(),
            'room_group_id' => RoomGroup::select('id')
                ->inRandomOrder()->first()->id,
        ];
    }
}
