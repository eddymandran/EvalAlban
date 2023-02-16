<?php

namespace Database\Seeders;

use App\Models\SalesPeople;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesPeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'lastname' => 'Pignon',
                'firstname' => 'François',
                'matricule' => '0123456789',
                'email' => 'francois.pignon@dinner.con',
            ],
            [
                'lastname' => 'Leblanc',
                'firstname' => 'Juste',
                'matricule' => '987654312',
                'email' => 'juste.leblanc@dinner.con',
            ],
            [
                'lastname' => 'Sassoeur',
                'firstname' => 'Marlène ',
                'matricule' => '346789654',
                'email' => 'marlene.sassoeur@dinner.con',
            ],


        ];

        foreach ($datas as $data) {
            SalesPeople::create($data);
        }
    }
}
