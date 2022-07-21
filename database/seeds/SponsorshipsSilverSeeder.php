<?php
use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipsSilverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newSponsorship = new Sponsorship();
        $newSponsorship->name = 'Silver';
        $newSponsorship->price = '05.99';
        $newSponsorship->duration = '72:00:00';


        $newSponsorship->save();
    }
}