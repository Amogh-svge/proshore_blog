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
        Schema::create('table_blog_category', function (Blueprint $table) {
            $table->foreignId('blog_id')->constrained('blogs')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();;

            $table->foreignId('category_id')->constrained('category')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_blog_category');
    }
};
