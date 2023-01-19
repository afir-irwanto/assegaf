<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butchers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->enum('skin_grade', ['baik','lokal','afkir','jantan','kulit_kepala']);
            $table->timestamps();
            
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('butchers');
    }
}
