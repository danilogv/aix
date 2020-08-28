<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CursoBd extends Migration
{
    public function up()
    {
        Schema::create("curso", function (Blueprint $table) {
            $table->increments("id");
            $table->string("nome", 100)->unique()->nullable(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists("curso");
    }
}
