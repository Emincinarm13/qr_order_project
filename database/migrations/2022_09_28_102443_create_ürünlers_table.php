<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ürünlers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isim');
            $table->integer('satış')->default(0);
            $table->integer('kategoriid');
            $table->string('image')->default(0);
            $table->float('fiyat');
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
        Schema::dropIfExists('ürünlers');
    }
};
