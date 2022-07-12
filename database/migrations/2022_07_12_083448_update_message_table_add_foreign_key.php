<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMessageTableAddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('house_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages',
            function (Blueprint $table) {
                $table->dropForeign('messages_house_id_foreign');
                $table->dropColumn('house_id');
            }
        );
    }
}