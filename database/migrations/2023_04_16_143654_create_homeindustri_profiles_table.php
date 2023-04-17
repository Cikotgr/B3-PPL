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
        Schema::create('homeindustri_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bussines_type_id');
            $table->foreign('bussines_type_id')->references('id')->on('bussines_types');
            $table->string('owner_name');
            $table->string('owner_telephone');
            $table->string('bussines_name');
            $table->string('bussines_email');
            $table->string('bussines_telephone');
            $table->string('bussines_material');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homeindustri_profiles');
    }
};
