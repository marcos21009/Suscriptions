<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscriptionsPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptions__plans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('code');
            $table->integer('status')->default(0);
            $table->integer('display_order')->nullable();
            $table->boolean('recommendation')->default(false);
            $table->boolean('free')->default(false);
            $table->boolean('visible')->default(false);
            $table->double('price',30,2)->nullable();
            $table->integer('frequency');
            $table->string('bill_cycle');
            $table->integer('trial_period')->default(0);
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('suscriptions__products')->onDelete('cascade');
            $table->text('options')->nullable();

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
        Schema::table('suscriptions__plans', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('suscriptions__plans');
    }
}
