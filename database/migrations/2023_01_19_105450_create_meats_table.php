<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('butcher_id');
            $table->integer('weight');
            $table->integer('price');
            $table->enum('meat_grade', ['putih','merah']);
            $table->integer('total_price');
            $table->timestamps();

            $table->dateTime('deleted_at')->nullable();

            $table->foreign('butcher_id')->references('id')->on('butchers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meats');
    }
}
