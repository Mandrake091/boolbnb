<?php

use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipsBronzeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newSponsorship = new Sponsorship();
        $newSponsorship->name = 'Bronze';
        $newSponsorship->price = '02.99';
        $newSponsorship->duration = '24:00:00';

        $newSponsorship->save();
    }
}