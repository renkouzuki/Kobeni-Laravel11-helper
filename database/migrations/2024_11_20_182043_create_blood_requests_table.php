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
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requester_id');
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->string('blood_type');
            $table->enum('status', ['pending', 'accepted', 'rejected','cancelled'])->default('pending');
            $table->text('message')->nullable();
            $table->integer('quantity')->nullable(); 
            $table->timestamps();
            $table->foreign('requester_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('set null');;
            $table->index(['requester_id', 'donor_id' , 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
