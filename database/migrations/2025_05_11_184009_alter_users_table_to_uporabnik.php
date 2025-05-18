<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        
        Schema::rename('users', 'uporabniki');
        
        Schema::table('uporabniki', function (Blueprint $table) {
            $table->renameColumn('name', 'ime');
            $table->renameColumn('password', 'geslo');
            $table->char('spol', 1)->nullable(); // M ali Ž
            $table->boolean('obvescanje')->default(true);
        });
        
    }

    public function down()
    {
        
        Schema::table('uporabniki', function (Blueprint $table) {
            $table->renameColumn('ime', 'name');
            $table->renameColumn('geslo', 'password');
            $table->dropColumn(['spol', 'obvescanje']);
        });
        
        Schema::rename('uporabniki', 'users');
        
    }
};
