<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Partner::create([
            'partner_name' => 'Mohamed'
        ]);

        App\Partner::create([
            'partner_name' => 'Hassan',
        ]);

        App\Partner::create([
            'partner_name' => 'Nada',
        ]);
    }
}
