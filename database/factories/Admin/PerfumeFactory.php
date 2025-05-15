<?php

namespace Database\Factories\Admin;
use App\Models\Admin\Perfume;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PerfumeFactory extends Factory
{
    protected $model = Perfume::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'picture' => fake()->imageUrl(640, 480, 'fashion', true, 'perfume'),
            'description' => fake()->paragraph(),
            'gender' => fake()->randomElement(['male', 'female','unisex']),
            'size' => fake()->randomElement([30, 50, 75, 100, 150]),
            'price' => fake()->randomFloat(2, 50, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
    }
        /**
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [

        ]);
    }
}
