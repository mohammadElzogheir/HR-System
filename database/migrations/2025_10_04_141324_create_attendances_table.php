<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->enum('status', ['present','absent'])->default('present');
            $table->timestamps();
            $table->unique(['employee_id','date']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('attendances');
    }
};
