<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id(); //BigInteger
            $table->string('description');

            //Irá guardar o id do usuario
            $table->unsignedBigInteger('user_id');

            $table->timestamps(); //created_at | updated_at

            //A coluna user_id vai referenciar o id lá da tabela usuario (1 pra N)
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
