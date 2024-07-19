<?php

use App\Models\Cimetiere;
use App\Models\Famille;
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
        Schema::create('defunts', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("postnom");
            $table->string("prenom");
            $table->enum("sexe",["M","F"]);
            $table->string("commentaire");
            $table->date("date_naissance");
            $table->date("date_deces");
            $table->date("date_enterrement");
            $table->string("oraison");
            $table->string("avatar_def");
            $table->string("avatar_cim");
            $table->foreignIdFor(Famille::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Cimetiere::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defunts');
    }
};
