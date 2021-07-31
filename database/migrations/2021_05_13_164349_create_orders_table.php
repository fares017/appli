<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('wilaya');
            $table->text('address');
            $table->bigInteger('code');
            $table->bigInteger('tel');
            $table->bigInteger('price');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('etat', ['en attente', 'Attente paiement', 'En cours', 'Termine', 'Annule', 'Rembourse']);
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
        Schema::dropIfExists('orders');
    }
}
