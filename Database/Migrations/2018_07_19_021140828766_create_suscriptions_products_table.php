<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscriptionsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptions__products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigne();
            $table->boolean('require_shipping_address')->default(false);
            $table->integer('status')->default(0);
            $table->integer('user_id');
            $table->text('options')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('restrict');


        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suscriptions__products', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('suscriptions__products');
    }
}
