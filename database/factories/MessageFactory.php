<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id' => User::inRandomOrder()->first()->id,
            'reciever_id' => User::inRandomOrder()->first()->id,
            'message' => fake()->text(random_int(20, 40)),
        ];
    }

    public function deletedMessages(): static
    {
        return $this->state(function (array $attributes) {
            $deletedBy = fake()->randomElement([$attributes['sender_id'], $attributes['reciever_id']]);
            return [
                'deleted_by' => $deletedBy,
                'deleted_at' => now(),
            ];
        });
    }
}
