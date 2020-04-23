<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id'); // Plano
            $table->uuid('uuid');
            $table->string('nif')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();


            //estado do tenant N - Sem acesso Y - Com acesso
            $table->enum('active', ['Y', 'N'])->default('Y');

            // Subscrição
            $table->date('subscription')->nullable(); // Data da inscrição
            $table->date('expires_at')->nullable(); // Data de expiração do plano
            $table->string('subscription_id', 255)->nullable(); // Identificação do gateway
            $table->boolean('subscription_active')->default(false); // Assinatura ativa, por defeito inativo
            $table->boolean('subscription_suspendend')->default(false); // Assinatura cancelada

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');

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
        Schema::dropIfExists('tenants');
    }
}
