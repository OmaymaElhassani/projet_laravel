<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminFactory extends Factory
{

    protected $model= User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'etudiant',
            'email' => 'etudiant@gmail.com',
            'is_user'=>1,
            'email_verified_at' => now(),
            'password' => Hash::make('etudiant1'),
            'remember_token' => Str::random(10),
        ];
    }
}
