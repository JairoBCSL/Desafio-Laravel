<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 30);
            $table->unsignedBigInteger('motivo_id');
            $table->foreign('motivo_id')->references('id')->on('motivos');
            $table->string('descricao', 100);
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->string('protocolo', 30);
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
        Schema::table('solicitacoes', function(Blueprint $table){
            $table->dropForeign('solicitacoes_motivo_id_foreign');
            $table->dropForeign('solicitacoes_status_id_foreign');
        });
        Schema::dropIfExists('solicitacoes');
    }
};
