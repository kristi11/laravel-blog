<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // function definition() has been modified to have a set email,admin state and password for easy access.
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->username(),
            'email' => 'admin@admin.com',
            'admin' => true,
            'email_verified_at' => now(),
            'password' => 'password', // password -> $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
