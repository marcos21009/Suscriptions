<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscriptionsFeatureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptions__feature_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('caption')->nullable();
            $table->text('description')->nullable();




            $table->integer('feature_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['feature_id', 'locale']);
            $table->foreign('feature_id')->references('id')->on('suscriptions__features')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suscriptions__feature_translations', function (Blueprint $table) {
            $table->dropForeign(['feature_id']);
        });
        Schema::dropIfExists('suscriptions__feature_translations');
    }
}
