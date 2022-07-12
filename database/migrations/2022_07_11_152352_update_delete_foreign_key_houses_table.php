<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDeleteForeignKeyHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            

            
            $table->dropForeign('houses_host_id_foreign');
            $table->dropColumn('host_id');
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            
            $table->foreignId('host_id')->constrained()->onDelete('cascade');
          
            
    });
}
}