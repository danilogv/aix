<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LoginBd extends Migration
{
    public function up()
    {
        Schema::create("login", function (Blueprint $table) {
            $table->increments("id");
            $table->string("email", 100)->nullable(false);
            $table->string("senha", 100)->nullable(false);
            $table->unique(['email', 'senha']);
        });
        DB::table("login")->insert(['email' => "teste@gmail.com", "senha" => '$2y$10$PBuy/siX.Ao0m9qBrToLU.1jTLR7oshE3KvH8787YrQ3DTTicguhS']); //admin
        DB::table("login")->insert(['email' => "danilo@hotmail.com", "senha" => '$2y$10$/3dzwSXgvGoGOifg8.RNj..46iEf8L7Dc5apd960o8s4FH5aJxAnm']); //123
    }

    public function down()
    {
        DB::table("login")->delete(2); 
        DB::table("login")->delete(1);
        DB::table("login")->insert(['email' => "danilo@hotmail.com", "senha" => '$2y$10$/3dzwSXgvGoGOifg8.RNj..46iEf8L7Dc5apd960o8s4FH5aJxAnm']); //123
        Schema::dropIfExists("login");
    }
}
