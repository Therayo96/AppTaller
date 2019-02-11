<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsupplier')->unsigned()->comment('Supplier ID');
            $table->foreign('idsupplier')->references('id')->on('supplier');
            $table->integer('iduser')->unsigned()->comment('User ID');
            $table->foreign('iduser')->references('id')->on('users');
            $table->string('type_voucher',20);
            $table->string('series_voucher',7)->nullable();
            $table->string('num_voucher',20);
            $table->dateTime('date_hour');
            $table->decimal('tax',4,2);
            $table->decimal('total',20,2);
            $table->string('state',20);
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
        Schema::dropIfExists('income');
    }
}
