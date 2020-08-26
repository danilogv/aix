<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CursoBd extends Migration
{
    public function up()
    {
        Schema::create("curso", function (Blueprint $table) {
            $table->char("id", 36)->primary();
            $table->string("nome", 100)->unique()->nullable(false);
            $table->char("aluno_id", 36); 
            $table->foreign("aluno_id")->references("id")->on("aluno")->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists("curso");
    }
}
