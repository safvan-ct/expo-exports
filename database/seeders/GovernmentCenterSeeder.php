<?php
namespace Database\Seeders;

use App\Models\GovernmentCenter;
use Illuminate\Database\Seeder;

class GovernmentCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "Amer Services"    => [
                'tagline'     => 'Simplifying Government Transactions for Dubai Residents',
                'desc_title'  => 'Effortless Government Documentation with Amer',
                'description' => 'Amer Typing Center Dubai provides a seamless and reliable solution for all your government documentation needs. We simplify complex UAE government procedures by offering fast, accurate, and centralized services under one roof. From visa processing to official applications, our expert team ensures a smooth, stress-free experience for residents and businesses across Dubai.',
            ],
            "Tasheel Services" => [
                'tagline'     => "Making labor-related processes easier for both the employer and the employee.",
                'desc_title'  => "Simplify Your MOL Experience: Discover Tasheel Services Dubai",
                'description' => "Tasheel Services Dubai makes Ministry of Labour (MOL) processes simple and stress-free. Our team provides accurate guidance and efficient support for all labour-related services, helping businesses and individuals complete their requirements smoothly and on time.",
            ],
            "Tadbeer Services" => [
                'tagline'     => "Domestic Workers - Recruitment, Visas, and Training for Maids/Nannies",
                'desc_title'  => null,
                'description' => null,
            ],
            "Tawjeeh Services" => [
                'tagline'     => "Worker Guidance - Labour Law awareness and employee orientation",
                'desc_title'  => null,
                'description' => null,
            ],
            "DET Services"     => [
                'tagline'     => "Simplifying Business in Dubai",
                'desc_title'  => "Experience Excellence with DET Services Dubai: Pioneering Tourism Innovation",
                'description' => "DET Services Dubai delivers excellence by supporting tourism growth and innovation across the emirate. We help businesses and individuals navigate tourism-related services with clarity, efficiency, and expert guidance, contributing to Dubai’s vision as a world-class destination.",
            ],
            "Ejari Services"   => [
                'tagline'     => "Making tenancy registration and rental documentation simple and hassle-free.",
                'desc_title'  => "Register Your Tenancy with Ease: Ejari Services Dubai",
                'description' => "Ejari Services Dubai helps tenants and landlords complete tenancy registration and rental contract approvals smoothly. Our team ensures accurate documentation and quick processing in compliance with Dubai Land Department regulations.",
            ],

            // "ICP Smart Services" => [
            //     'tagline'     => "Simplifying residency, visa, and identity services for individuals and families.",
            //     'desc_title'  => "Smart & Seamless ICP Services Dubai",
            //     'description' => "ICP Smart Services Dubai provides easy access to federal residency, visa, Emirates ID, and citizenship-related services. Our expert team ensures accurate processing and smooth completion of all ICP requirements, saving you time and effort.",
            // ],
            // "PRO Services"       => [
            //     'tagline'     => "Reliable support for business, visa, and government approvals in Dubai.",
            //     'desc_title'  => "Trusted PRO Services in Dubai",
            //     'description' => "Our PRO Services in Dubai handle all government-related documentation, approvals, and follow-ups on your behalf. We ensure smooth coordination with UAE authorities, helping businesses and individuals save time, avoid delays, and stay compliant.",
            // ],

            // "GDRFA Services"    => [],
            // "Notary Typing"             => [],
            // "Overstay Fines"            => [],
            // "Attestation and Translation Services" => [],
        ];

        $order = 1;
        foreach ($data as $key => $govtServices) {
            GovernmentCenter::create([
                'menu_id'     => 1,
                'name'        => $key,
                'slug'        => str()->slug($key),
                'tagline'     => $govtServices['tagline'] ?? null,
                'desc_title'  => $govtServices['desc_title'] ?? null,
                'description' => $govtServices['description'] ?? null,
                'sort_order'  => $order++,
            ]);
        }
    }
}
