<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name'     => 'Expo Exports',
        //     'email'    => 'expoexports@admin.com',
        //     'password' => Hash::make('expo@2026$exports'),
        // ]);

        $this->call([
            SliderSeeder::class,
            CategorySeeder::class,
            SettingsSeeder::class,
            ProductSeeder::class
        ]);
    }
}
