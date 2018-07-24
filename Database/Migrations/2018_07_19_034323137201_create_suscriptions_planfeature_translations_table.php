<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscriptionsPlanFeatureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptions__planfeature_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('value')->nullable();

            $table->integer('planfeature_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['planfeature_id', 'locale']);
            $table->foreign('planfeature_id')->references('id')->on('suscriptions__planfeatures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suscriptions__planfeature_translations', function (Blueprint $table) {
            $table->dropForeign(['planfeature_id']);
        });
        Schema::dropIfExists('suscriptions__planfeature_translations');
    }
}
