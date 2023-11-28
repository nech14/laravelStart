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
            $table->timestamps();

            $table->boolean('publiched')->default(true);
            $table->timestamp('publiched_at')->nullable();

            $table->bigInteger('coach_id')->unsigned();
            $table->foreign('coach_id')->references('id')->on('coaches');
            $table->string('name');
            $table->text('body');
            $table->decimal('price');            
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
