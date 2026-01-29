<?php
namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'category_id' => Category::inRandomOrder()->value('id'),
            'name'        => $name,
            'slug'        => Str::slug($name),
            'description' => $this->faker->paragraph(3),
            'is_active'   => true,
            'image'       => null, // you can add fake image later
        ];
    }
}
