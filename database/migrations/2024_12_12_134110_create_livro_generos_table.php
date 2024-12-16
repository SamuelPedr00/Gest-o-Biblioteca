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
        Schema::create('livro_generos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("genero_id");
            $table->unsignedBigInteger("livro_id");

            $table->foreign("genero_id")->references("id")->on("generos")->onDelete("cascade");
            $table->foreign("livro_id")->references("id")->on("livros")->onDelete("cascade");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_generos');
    }
};
