<?php

declare(strict_types = 1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'  => $name = fake('pt_BR')->company(),
            'phone' => fake('pt_BR')->phoneNumber(),
            'about' => fake()->paragraph(2, true),
            'logo'  => fake()->imageUrl(640, 480, 'business'),
            'slug'  => Str::slug($name),

        ];
    }
}
