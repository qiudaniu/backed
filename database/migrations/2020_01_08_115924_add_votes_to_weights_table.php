<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weights', function (Blueprint $table) {
            $table->smallInteger('left_section')->after('max');
            $table->smallInteger('right_section')->after('left_section');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weights', function (Blueprint $table) {
            $table->dropColumn('left_section');
            $table->dropColumn('right_section');
        });
    }
}
