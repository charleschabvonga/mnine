<?php

use App\Models\Language;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $table = 'people';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table, static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('south_african_id_no')->unique();
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->string('birth_date');
            $table->foreignIdFor(Language::class)->constrained();
            $table->longText('interests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
