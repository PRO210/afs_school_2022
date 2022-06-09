<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_book', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->date('REQUERIDO');
            $table->date('PREVISAO_ENTREGA')->nullable();;
            $table->date('DEVOLUCAO')->nullable();
            /* Pessoa que emprestou o livro */
            $table->text('CONDICAO')->nullable();
            /* Pessoa que pegou o livro */
            $table->text('COMENTARIO')->nullable();
            /* Pessoa que emprestou o livro */
            $table->text('OBSERVACOES')->nullable();

            $table->timestamps();
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_book');
    }
}
