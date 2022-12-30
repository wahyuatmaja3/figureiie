<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Franchise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Figure>
 */
class FigureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(7, true),
            'price' => $this->faker->numberBetween(1,100) * 100000,
            'chara' => $this->faker->firstName(),
            'material' => $this->faker->randomElement(['ABS', 'PVC']),
            'size' => $this->faker->numberBetween(100, 1000) . 'MM',
            'slug' => $this->faker->slug(),
            'brand_id' => Brand::find(1),
            'franchise_id' => Franchise::find(1),
            'category_id' => Category::find(1),
        ];
    }
} 
