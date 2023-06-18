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

            // funções 101-Master, 102-DMT, 103-COBM, 104-COBMI
            // 2 - Chefe SPO
            // 3 - Comandante de Guarnição
            $table->enum('funcao', ['101', '102', '103', '104', 
            '201', '202','203','204','205', '206','207','208','209','210','211','212','213','214','215','216','217','218','219','220',
            '301', '302','303','304','305', '306','307','308','309','310','311','312','313','314','315','316','317','318','319','320',]);

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
