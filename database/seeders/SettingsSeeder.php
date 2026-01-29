<?php
namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'primary_phone'    => '971522857577',
            'email'            => 'shafeeqmsd@gmail.com',
            'whatsapp'         => '971522857577',
            'whatsapp_message' => 'Hello, I would like to know more about your services.',
            'service_tagline'  => 'Easily manage and process your applications with our premium streamlined system.',
            'about_us'         => 'Easily manage and process your applications with our premium streamlined system.',
            'useful_services'  => '1,2,3,4',
            'key_services'     => '1,2,3,4',
        ];

        foreach ($data as $key => $item) {
            Settings::create(['key' => $key, 'value' => $item]);
        }
    }
}
