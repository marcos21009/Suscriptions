<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscriptionsPlanFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptions__planfeatures', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('feature_id')->unsigned();
            $table->integer('plan_id')->unsigned();


            $table->foreign('feature_id')->references('id')->on('suscriptions__features')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('suscriptions__plans')->onDelete('cascade');


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
        Schema::table('suscriptions__planfeatures', function (Blueprint $table) {
            $table->dropForeign(['feature_id']);
            $table->dropForeign(['plan_id']);
        });

        Schema::dropIfExists('suscriptions__planfeatures');
    }
}
