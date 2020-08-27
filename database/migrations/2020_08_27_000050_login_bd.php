<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoginBd extends Migration
{
    public function up()
    {
        Schema::create("login", function (Blueprint $table) {
            $table->char("id", 36)->primary();
            $table->string("email", 100)->nullable(false);
            $table->string("senha", 100)->nullable(false);
            $table->unique(['email', 'senha']);
        });
    }

    public function down()
    {
        Schema::dropIfExists("login");
    }
}
