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
        Schema::create('motivos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo');
            $table->unsignedBigInteger('solicitacao_id');
            $table->foreign('solicitacao_id')->references('id')->on('motivos');
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
        Schema::table('motivos', function(Blueprint $table){
            $table->dropForeign('motivos_solicitacao_id_foreign');
        });
        Schema::dropIfExists('motivos');
    }
};
