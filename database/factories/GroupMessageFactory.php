<?php

namespace Database\Factories;

use App\Models\GroupMember;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupMessage>
 */
class GroupMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $group = GroupMember::inRandomOrder()->first();

        return [
            'group_id' => $group->group_id,
            'sender_id' => $group->user_id,
            'message' => fake()->text(random_int(20, 30)),
        ];
    }
}
