<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Room;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            $hotel = [
                'name' => 'Tên khách sạn ' . $i,
                'address' => 'Địa chỉ khách sạn ' . $i,
                'phone_number' => '091234567' . $i,
                'website' => 'www.kh' . $i . '.com',
            ];

            $hotelId = Hotel::insertGetId($hotel);

            //Insert the new room into the database

            for ($j = 0; $j < 20; $j++) {

                $room = [
                    'type' => 'Loại phòng ' . $i,
                    'number_of_beds' => rand(1, 4),
                    'price' => rand(1000000, 5000000),
                    'hotel_id' => $hotelId,
                ];
    
                Room::create($room);
            }
        }
    }
}
