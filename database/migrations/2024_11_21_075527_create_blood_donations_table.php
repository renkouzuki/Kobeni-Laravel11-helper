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
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id');
            $table->string('blood_type');
            $table->integer('quantity');
            $table->timestamp('donation_date');
            $table->timestamps();
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['donor_id', 'blood_type', 'donation_date']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_donations');
    }
};
