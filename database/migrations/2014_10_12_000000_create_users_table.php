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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('role', ['Master', 'DMT', 'COBM', 'COBMI', '1ºGBM/SPO', '1ºGBM/OP/CMD']);

            $table->rememberToken();
            $table->timestamps();

            $table->string('num_funcional');
            $table->bigInteger('num_autenticador')->nullable();
            $table->integer('ult_num_autenticado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
