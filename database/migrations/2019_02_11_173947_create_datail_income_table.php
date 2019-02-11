<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatailIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datail_income', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idincome')->unsigned()->comment('Income ID');
            $table->foreign('idincome')->references('id')->on('income');
            $table->integer('idarticles')->unsigned()->comment('Articles ID');
            $table->foreign('idarticles')->references('id')->on('articles');
            $table->integer('quantity');
            $table->decimal('price',20,2);
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
        Schema::dropIfExists('datail_income');
    }
}
