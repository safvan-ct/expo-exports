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
            'address_1'           => 'Expo Exports, Business Park, MG Road,',
            'address_2'           => 'Kochi, Kerala, India - 682016',

            'primary_phone'       => '91 123 456 7890',
            'email'               => 'example@gmail.com',

            'whatsapp'            => '911234567890',
            'whatsapp_message'    => 'Hello, I would like to know more about your services.',

            'about_us'            => 'Expo Exports specializes in sourcing and exporting quality products worldwide. We focus on international standards, efficient logistics, and long-term global partnerships.',

            'about_header'        => "Our Legacy in Global Trade",

            'home_about_heading'  => "We are a trusted exporting company",
            'home_about_desc'     => "Delivering high quality products across the global market. Our focus on quality, timely delivery, and long-term partnerships.",
            'home_about_image'    => null,

            'about_heading'       => "A Trusted Name in Exporting Quality Since 2025",
            'about_desc_1'        => "Expo Global was founded on the principle of bridging the gap between local quality producers and the international market. We specialize in the sourcing, processing, and shipping of premium agricultural goods and processed food items.",
            'about_desc_2'        => "With a robust network spanning over 50 countries, we ensure that every product leaving our facility meets international safety standards (ISO & Global GAP). Our focus isn't just on shipping products; it's on building lasting partnerships.",
            'about_image'         => null,
            'about_features'      => "Certified Quality, Global Network, Timely Delivery, Long-Term Partnerships",

            'years_of_experience' => '2',
            'total_clients'       => '18',
            'tons_exported'       => '380',
            'countries_served'    => '5',

            'vision'              => "To be the most reliable and innovative global bridge for high-quality food products, setting benchmarks in ethical trade and sustainability.",
            'mission'             => "To empower local farmers by providing them a global platform while ensuring our international buyers receive only the freshest, highest-grade produce.",
        ];

        foreach ($data as $key => $item) {
            Settings::create(['key' => $key, 'value' => $item]);
        }
    }
}
