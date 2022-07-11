<?php

use Illuminate\Database\Seeder;
use App\House;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {

            $newHouse = new House();
            $newHouse->title = $faker->words(5, true);
            $newHouse->slug = Str::of($newHouse->name)->slug('-');

            $newHouse->check_in =
                $faker->dateTimeInInterval('-1 week');

            $newHouse->check_out =
                $faker->dateTimeInInterval('+1 week');

            $newHouse->description = $faker->text(50);

            $newHouse->night_price =
                $faker->randomFloat(2, 30, 100);

            $newHouse->n_room = $faker->randomDigitNotNull();

            $newHouse->n_bed = $faker->randomDigitNotNull(7, 8, 9);

            $newHouse->n_bathroom = $faker->randomDigitNotNull(5, 6, 7, 8, 9);

            $newHouse->square_meters =
                $faker->randomNumber(2, true);
                
            $newHouse->host_id =
            $faker->unique()->$faker->numberBetween(1, 15);
            
            $newHouse->message_id =
            $faker->unique()->$faker->numberBetween(1, 15);

            $newHouse->view_id =
            $faker->unique()->$faker->numberBetween(1, 15);

            $newHouse->image =
                $faker->imageUrl(640, 480, 'house', true);

            $newHouse->state =
                $faker->state();

            $newHouse->city =
                $faker->city();

            $newHouse->address =
                $faker->address();

            $newHouse->longitude =
                $faker->longitude($min = -180, $max = 180);

            $newHouse->latitude =
                $faker->latitude($min = -90, $max = 90);

            $newHouse->visibility =
                $faker->boolean();
                
                
            $newHouse->save();
        }
    }
}