<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            $customer = [
                'name' => 'Tên khách hàng ' . $i,
                'email' => 'email_kh' . $i . '@example.com',
                'phone_number' => '091234567' . $i,
                'address' => 'Địa chỉ khách hàng ' . $i,
            ];

            \App\Models\Customer::create($customer);
        }
    }
}
