<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('IDENTIFICADOR')->nullable();
            $table->string('ESCRITOR')->nullable();
            $table->string('TITULO');
            $table->string('EDITORA')->nullable();
            $table->date('ANO_LANCAMENTO')->nullable();
            $table->string('ETAPA')->nullable();
            $table->string('TURMA')->nullable();
            $table->string('CONSUMIVEL')->nullable();
            $table->string('FISICO_VIRTUAL')->nullable();
            $table->string('CEDIVEL')->nullable();
            $table->string('QUANTIDADE')->nullable();
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
        Schema::dropIfExists('books');
    }
}
