<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $userIds = null;
        static $usedPairs = [];

        if ($userIds === null) {
            $userIds = User::pluck('id')->toArray();
        }

        do {
            $userId = fake()->randomElement($userIds);
            $contactId = fake()->randomElement($userIds);
        } while ($userId === $contactId || in_array([$userId, $contactId], $usedPairs));

        $usedPairs[] = [$userId, $contactId];

        return [
            'user_id' => $userId,
            'contact_id' => $contactId,
            'name' => fake()->name(),
        ];
    }
}
