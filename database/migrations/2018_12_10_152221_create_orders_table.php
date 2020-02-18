<?php
//NARUDŽBENICA
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->string('naziv_prod');
            $table->string('mjesto');
            $table->integer('ulica_br');
            $table->integer('broj_tel');
            $table->integer('oib');
            $table->integer('racun_prim');
            $table->string('zavod');
            $table->date('nadnevak');
            $table->text('naruc_dobra');
            $table->text('rok_isporuke');
            $table->text('nacin_otpreme');
            $table->string('rok');
            $table->string('nacin_placanja');
            $table->string('sastavio');
            $table->string('odobrio');
            $table->integer('user_id');
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
        Schema::dropIfExists('orders');
    }
}
