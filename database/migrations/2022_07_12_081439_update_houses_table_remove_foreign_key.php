<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHousesTableRemoveForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropForeign('houses_message_id_foreign');
            $table->dropForeign('houses_view_id_foreign');
            $table->dropColumn('message_id');
            $table->dropColumn('view_id');
            $table->boolean('visibility')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'houses',
            function (Blueprint $table) {
                $table->foreignId('view_id')->constrained()->onDelete('cascade');
                $table->foreignId('message_id')->constrained()->onDelete('cascade');
                $table->string('visibility')->change();
            }
        );
    }
}