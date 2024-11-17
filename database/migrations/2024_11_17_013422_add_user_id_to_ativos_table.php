<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ativos', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Adiciona a coluna user_id após id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Adiciona chave estrangeira
        });
    }

    public function down()
    {
        Schema::table('ativos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
