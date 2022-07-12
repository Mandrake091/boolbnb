<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHouseServicesTableRemoveAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('house_service', function (Blueprint $table) {
            $table->dropForeign('house_service_house_id_foreign');
            $table->dropForeign('house_service_service_id_foreign');
            $table->dropColumn('house_id');
            $table->dropColumn('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('house_service', function (Blueprint $table) {
            $table->foreignId('house_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
        });
    }
}
