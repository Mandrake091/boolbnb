<?php

use Illuminate\Database\Seeder;

use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Appartamento', 'Hotel', 'Ostello', 'Villa', 'Bed & Breakfast', 'Baita', 'Campeggio', 'Bungalow'];
        
        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}