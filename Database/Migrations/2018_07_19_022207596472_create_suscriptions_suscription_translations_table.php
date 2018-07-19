<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscriptionsSuscriptionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptions__suscription_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('suscription_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['suscription_id', 'locale']);
            $table->foreign('suscription_id')->references('id')->on('suscriptions__suscriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suscriptions__suscription_translations', function (Blueprint $table) {
            $table->dropForeign(['suscription_id']);
        });
        Schema::dropIfExists('suscriptions__suscription_translations');
    }
}
