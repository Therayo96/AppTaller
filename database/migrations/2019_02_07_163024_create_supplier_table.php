<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->unique()->comment('Name of company');
            $table->string('type_document',20);
            $table->string('num_document',20)->unique();
            $table->string('address',30);
            $table->string('telephone',20);
            $table->string('email',30);
            $table->string('contact',30)->comment('Name of contact');
            $table->string('num_contact',20);
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
        Schema::dropIfExists('supplier');
    }
}
