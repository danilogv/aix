<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoginBd extends Migration
{
    public function up()
    {
        Schema::create("login", function (Blueprint $table) {
            $table->string("email", 100)->nullable(false);
            $table->string("senha", 100)->nullable(false);
            $table->char("aluno_id", 36)->unique()->nullable(false);
            $table->unique(['email', 'senha']);
            $table->foreign("aluno_id")->references("id")->on("aluno")->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists("login");
    }
}
