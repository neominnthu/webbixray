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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('assigned_technician_id')->nullable()->constrained('users');
            $table->string('subject');
            //$table->string('slug');
            $table->text('message');
            $table->foreignId('ticket_category_id')->constrained()->onDelete('cascade');
            $table->text('encrypted_message'); // encrypted message
            $table->enum('status', ['open', 'pending', 'resolved'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
