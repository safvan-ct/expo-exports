<?php
namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'PRO',
            'Services',
            'Business',
            'Visa',
        ];

        foreach ($data as $key => $item) {
            Menu::create([
                'name'       => $item,
                'slug'       => str()->slug($item),
                'sort_order' => $key + 1,
            ]);
        }
    }
}
