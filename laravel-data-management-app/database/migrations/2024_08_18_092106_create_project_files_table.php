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
        Schema::create('project_files', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('project_id'); // Foreign key (projects.id)
            $table->string('file', 255); // File path or name
            $table->string('mime_type', 50); // MIME type of the file
            $table->timestamps(); // Timestamps for created_at and updated_at
            $table->unsignedBigInteger('created_by'); // Foreign key (users.id) - who created the file
            $table->unsignedBigInteger('updated_by')->nullable(); // Foreign key (users.id) - who last updated the file

            // Define foreign key constraints
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_files');
    }
};
