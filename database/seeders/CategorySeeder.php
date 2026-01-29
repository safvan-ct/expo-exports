<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Vegetables',
            'Fruits',
            'Food Items',
        ];

        foreach ($data as $key => $item) {
            Category::create([
                'name'        => $item,
                'slug'        => str()->slug($item),
                'sort_order'  => $key + 1,
                'is_featured' => true,
            ]);
        }
    }
}
