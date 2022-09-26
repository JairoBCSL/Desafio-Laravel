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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('solicitacao_id');
            $table->foreign('solicitacao_id')->references('id')->on('statuses');
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
        Schema::table('statuses', function(Blueprint $table){
            $table->dropForeign('statuses_solicitacao_id_foreign');
        });
        Schema::dropIfExists('statuses');
    }
};
