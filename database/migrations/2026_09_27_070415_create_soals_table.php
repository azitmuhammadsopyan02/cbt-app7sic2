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
    Schema::create('soals', function (Blueprint $table) {
        $table->id();

        $table->foreignId('ujian_id')
            ->constrained('ujians')
            ->cascadeOnDelete();

        $table->text('pertanyaan');
        $table->text('pilihan_a');
        $table->text('pilihan_b');
        $table->text('pilihan_c');
        $table->text('pilihan_d');
        $table->char('jawaban_benar', 1);

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('soals');
}
};
