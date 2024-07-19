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
        Schema::create('familles', function (Blueprint $table) {
            $table->id();
            $table->string("nom")->unique();
            $table->string("email")->unique();
            $table->string("telephone")->unique();
            $table->string("adresse")->nullable();
            $table->enum("type",['VIP','NORMALE']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familles');
    }
};
