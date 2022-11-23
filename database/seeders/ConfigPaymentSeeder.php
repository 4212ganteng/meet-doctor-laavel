<?php

namespace Database\Seeders;

// imp models

use App\Models\Masterdata\ConfigPayment;

// imp thiscode
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ConfigPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create data her
        $config_payment = [
            [
                'fee' => '150000', 
                'vat' => '20', //percent,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ];
        ConfigPayment::insert($config_payment);
    }
}
