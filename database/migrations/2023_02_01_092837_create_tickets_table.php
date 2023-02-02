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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_usuario')->default(1);
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->text('descripcion');

            $table->unsignedBigInteger('id_estado')->default(1);
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade');

             
            $table->string('tecnico_asignado')->default('Sin asignar');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
