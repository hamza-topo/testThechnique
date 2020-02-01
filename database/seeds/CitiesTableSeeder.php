<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\City::create([
            'citiy_name' => 'Rabat',
            'partner_id' => App\Partner::find(1)->id
        ]);

        App\City::create([
            'citiy_name' => 'Casa',
            'partner_id' => App\Partner::find(2)->id
        ]);

        App\City::create([
            'citiy_name' => 'Tangier',
            'partner_id' => App\Partner::find(3)->id
        ]);
    }
}
