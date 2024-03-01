<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('quantity')->default(0);
            $table->decimal('price', 8, 2);
            $table->decimal('discount_price', 8, 2)->nullable();
            // $table->boolean('status')->default(1);
            // $table->softDeletes();
            // $table->timestamp('published_at')->nullable();
            // $table->timestamp('archived_at')->nullable();
            // // $table->timestamp('deleted_at')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};