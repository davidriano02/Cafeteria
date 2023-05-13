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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',10);
            $table->string('nombre',50);
            $table-> foreignId('id_categoria')
                  ->nullable() 
                  ->constrained('categorias')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->integer('peso');
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
