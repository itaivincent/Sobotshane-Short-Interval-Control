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
        Schema::create('planroutes', function (Blueprint $table) {
            $table->id();
            $table->string('contractplanId')->nullable();
            $table->string('routeplanId')->nullable();
            $table->string('routeId')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('activity')->nullable();
            $table->double('distance')->nullable();
            $table->bigInteger('totalQuantity')->nullable();
            $table->bigInteger('estimatedmonthQuantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('Type')->nullable();
            $table->string('rate')->nullable();
            $table->string('routeCategory')->nullable();
            $table->string('resourcePoolStatus')->nullable();
            $table->string('status')->nullable();
            $table->string('monthly')->nullable();       
            $table->string('weekly')->nullable();
            $table->string('daily')->nullable(); 
            $table->string('createdBy')->nullable();
            $table->string('updatedBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planroutes');
    }
};
