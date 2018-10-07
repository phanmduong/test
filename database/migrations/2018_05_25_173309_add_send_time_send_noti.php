<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSendTimeSendNoti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('send_notifications', function (Blueprint $table) {
            $table->string('status')->nullable();
            $table->dateTime('send_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('send_notifications', function (Blueprint $table) {
            //
        });
    }
}
