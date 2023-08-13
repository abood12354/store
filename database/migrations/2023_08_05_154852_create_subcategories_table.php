<?php

use App\Models\Category;
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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Category::class,'parent_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(Category::class,'subcategory_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('subcategory_id')->nullable()->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
