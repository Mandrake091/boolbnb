<?php

use Illuminate\Database\Seeder;
use App\Service;


class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Wi-fi', 'Cucina', 'A/C', 'Tv', 'Asciugacapelli', 'Piscina', 'Colazione', 'Palestra','Fumatori', 'Parcheggio', 'Asciugamani', 'Terrazza', 'Balcone', 'Barbeque', 'Spa', 'Giardino'];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name = $service;
            $newService->save();
        }
    }
}