<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlunoBd extends Migration
{
    public function up()
    {
        Schema::create("aluno", function (Blueprint $table) {
            $table->char("id", 36)->primary();
            $table->string("nome", 100)->nullable(false);
            $table->integer("matricula")->unique()->nullable(false);
            $table->enum("situacao", ['ativo', 'inativo'])->default('inativo')->nullable(false);
            $table->string("endereco", 255)->nullable(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists("aluno");
    }
}
