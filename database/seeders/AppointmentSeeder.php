<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\SalesPeople;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albanUser = User::where('name', 'alban')->first();
        $totoUser = User::where('name', 'toto')->first();
        $pigonSalesPeople = SalesPeople::where('lastname', 'Pignon')->first();
        $leblancSalesPeople = SalesPeople::where('lastname', 'Leblanc')->first();
        $sassoeurSalesPeople = SalesPeople::where('lastname', 'Sassoeur')->first();

        $datas = [
            [
                'user_id' => $albanUser->id,
                'sales_people_id' => $pigonSalesPeople->id,
                'start_appointment_date' => Carbon::create(2023, 2, 17, 9, 0, 0),
                'end_appointment_date' => Carbon::create(2023, 2, 17, 10, 0, 0),
            ],
            [
                'user_id' => $albanUser->id,
                'sales_people_id' => $leblancSalesPeople->id,
                'start_appointment_date' => Carbon::create(2023, 2, 17, 10, 0, 0),
                'end_appointment_date' => Carbon::create(2023, 2, 17, 11, 0, 0),
            ],
            [
                'user_id' => $totoUser->id,
                'sales_people_id' => $sassoeurSalesPeople->id,
                'start_appointment_date' => Carbon::create(2023, 2, 17, 10, 0, 0),
                'end_appointment_date' => Carbon::create(2023, 2, 17, 11, 0, 0),
            ]
        ];

        foreach ($datas as $data) {
            Appointment::create($data);
        }

    }
}
