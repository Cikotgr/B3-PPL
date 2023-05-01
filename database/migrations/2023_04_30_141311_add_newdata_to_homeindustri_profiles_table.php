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
        Schema::table('homeindustri_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('banner');
            $table->string('owner_email');
            $table->string('address');
            $table->char('city_id',4)->nullable();
            $table->foreign('city_id')->references('id')->on('regencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homeindustri_profiles', function (Blueprint $table) {
            //
        });
    }
};
