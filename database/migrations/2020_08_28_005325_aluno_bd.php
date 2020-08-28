<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlunoBd extends Migration
{
    public function up()
    {
        Schema::create("aluno", function (Blueprint $table) {
            $table->increments("id");
            $table->string("nome", 100)->nullable(false);
            $table->integer("matricula")->unique()->nullable(false);
            $table->enum("situacao", ['ativo', 'inativo'])->default('inativo')->nullable(false);
            $table->string("endereco", 255)->nullable(false);
            $table->binary("foto")->nullable(false);
            $table->integer("curso_id")->unsigned();
            $table->unique(['nome', 'curso_id']);
            $table->foreign("curso_id")->references("id")->on("curso")->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists("aluno");
    }
}
