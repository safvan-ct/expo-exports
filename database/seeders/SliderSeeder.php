<?php
namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "title"       => "Global Export Solutions You Can Trust",
                'description' => "Delivering Quality Products Worldwide.",
            ],
            [
                "title"       => "Global Export Solutions",
                'description' => "Trusted logistics and cargo handling for international trade.<",
            ],
        ];

        foreach ($data as $item) {
            Slider::create($item);
        }
    }
}
