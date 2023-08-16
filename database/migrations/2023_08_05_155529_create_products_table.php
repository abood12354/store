<?php

use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Vendor;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //$table->foreignIdFor(Subcategory::class,'subcategory_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('subcategories_id')->nullable()->references('id')->on('subcategories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Vendor::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Admin::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status',['New','Old'])->default('New');
            $table->string('name');
            $table->float('price');
            $table->integer('quantity');
            $table->integer('Assess');
            $table->decimal('sell',9,2);
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
