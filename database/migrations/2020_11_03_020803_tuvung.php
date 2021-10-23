<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tuvung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuvung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idchude');
            $table->string('ten');
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
        Schema::dropIfExists('tuvung');
    }
}
