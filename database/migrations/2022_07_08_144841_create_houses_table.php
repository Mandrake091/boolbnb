<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('host_id')->constrained();
            $table->string('title', 100);
            $table->string('slug', 130)->unique();
            $table->foreignId('type_id')->constrained();
            $table->date('check_in');
            $table->date('check_out');
            $table->text('description');
            $table->float('night_price', 4,2);
            $table->tinyInteger('n_room');
            $table->tinyInteger('n_bed');
            $table->tinyInteger('n_bathroom');
            $table->integer('square_meters');
            $table->string('image');
            $table->string('state', 150);
            $table->string('city', 150);
            $table->string('address');
            $table->integer('longitude');
            $table->integer('latitude');
            $table->string('visibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}