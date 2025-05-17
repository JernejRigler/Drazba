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
        Schema::create('drazbas', function (Blueprint $table) {
            $table->id();
            $table->string('ime_izdelka');
            $table->string('izvajalec');
            $table->dateTime('datum_zacetka');
            $table->dateTime('trajanje'); // in hours
            $table->decimal('price', 10, 2);
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
        Schema::dropIfExists('drazbas');
    }
};
