<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupMember>
 */
class GroupMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $userGroupPairs = [];
        do {
            $groupId = Group::inRandomOrder()->first()->id;
            $userId = User::inRandomOrder()->first()->id;
        } while (in_array([$groupId, $userId], $userGroupPairs));

        $userGroupPairs[] = [$groupId, $userId];
        return [
            'group_id' => $groupId,
            'user_id' => $userId,
        ];
    }
}
