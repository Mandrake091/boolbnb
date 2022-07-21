<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;
class SponsorshipsGoldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newSponsorship = new Sponsorship();
        $newSponsorship->name = 'Gold';
        $newSponsorship->price = '09.99';
        $newSponsorship->duration = '144:00:00';
        $newSponsorship->save();
    }
}