<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKeyComponentToRobotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('robots', function (Blueprint $table) {
            $table->unsignedBigInteger('key_component_id');
            $table->foreign('key_component_id')->references('id')->on('key_components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('robots', function (Blueprint $table) {
            $table->dropForeign('key_component_id');
        });
    }
}
