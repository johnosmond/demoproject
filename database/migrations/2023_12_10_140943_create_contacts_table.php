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
        Schema::create('contacts', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('customer_id'); // foreign key
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('phone', 20);
            $table->boolean('text_capable')->default(false);
            $table->string('email', 100);
            $table->boolean('inactive')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
