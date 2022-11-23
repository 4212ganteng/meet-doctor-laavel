<?php

namespace Database\Seeders;
// imp models
use App\Models\Masterdata\Specialist;
use Illuminate\Database\Seeder;

// imp thiscode
use Illuminate\Support\Facades\DB;


class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            $specialist = [
                [
                    'name' => 'Dermatology',
                    'price' => '150000',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Dentist',
                    'price' => '10000',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ortodocts',
                    'price' => '30000',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Urology',
                    'price' => '75000',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ];
        
            Specialist::insert($specialist);
    }
}
