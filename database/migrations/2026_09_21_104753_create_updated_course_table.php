
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
        Schema::create('updated_course', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->foreignId('course_id')
                ->constrained('courses')
                ->onDelete('cascade');

            $table->foreignId('requirment_id')
                ->nullable()
                ->constrained('subjects')
                ->onDelete('cascade');

            $table->text('description');
            $table->string('short_description');
            $table->decimal('price', 7, 2);
            $table->decimal('discount', 5, 2)->nullable();

            $table->string('image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('updated_course');
    }
};

