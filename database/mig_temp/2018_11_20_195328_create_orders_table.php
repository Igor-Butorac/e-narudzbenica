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
            $table->date('nadnevak');
            $table->text('naruc_dobra');
            $table->text('rok_isporuke');
            $table->text('nacin_otpreme');
            $table->integer('rb');
            $table->string('naziv_dobra');
            $table->integer('jed_mjere');
            $table->integer('kolicina');
            $table->decimal('cijena_bez_pdv', 10, 2);
            $table->decimal('iznos5x4', 10, 2);
            $table->string('rok');
            $table->string('sastavio');
            $table->string('odobrio');
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
