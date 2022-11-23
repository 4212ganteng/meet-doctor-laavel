<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create func yhis call
        $this->call([
            TypeUserSeeder::class,
            SpecialistSeeder::class,
            ConsultationSeeder::class,
            ConfigPaymentSeeder::class,
        ]);
    }
}
