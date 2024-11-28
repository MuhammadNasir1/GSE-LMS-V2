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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->integer('assessor_id');
            $table->string('qualification_number');
            $table->integer('with_optional')->default(0);
            $table->integer('mandatory_assignments');
            $table->integer('optional_assignments');
            $table->integer('option_selected');
            $table->integer('total_assignments');
            $table->integer('course_assignments');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
