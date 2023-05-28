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
        Schema::create('lastorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telefon');
            $table->string('masa');
            $table->longText('json');
            $table->double('tutar');
            $table->string('mesaj')->nullable();
            $table->string('durum');
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
        Schema::dropIfExists('lastorders');
    }
};
