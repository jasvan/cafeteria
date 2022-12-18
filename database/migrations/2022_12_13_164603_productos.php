<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->char('nombre', 30);
            $table->char('referencia', 10);
            $table->char('descripcion', 100);
            $table->decimal('precio', 6,2);
            $table->char('peso', 6);
            $table->char('categoria', 10);
            $table->integer('total');            
            $table->integer('vendidos')->default(0);            
            $table->timestamps();
        });
    }

       public function down()
    {
        Schema::dropIfExists('productos');
    }
};
