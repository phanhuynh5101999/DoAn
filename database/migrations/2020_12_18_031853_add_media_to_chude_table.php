<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMediaToChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoclai', function (Blueprint $table) {
            $table->string('hinhanh');
            $table->string('amthanh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoclai', function (Blueprint $table) {
            $table->dropColumn('hinhanh');
            $table->dropColumn('amthanh');

        });
    }
}
