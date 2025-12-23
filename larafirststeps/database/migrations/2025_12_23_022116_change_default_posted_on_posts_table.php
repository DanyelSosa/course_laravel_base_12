<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Cambiar el default de 'posted' a 'no'
            $table->enum('posted', ['yes', 'no'])->default('no')->change();
        });

        // Opcional: actualizar los registros existentes que tengan 'not'
        DB::table('posts')->where('posted', 'not')->update(['posted' => 'no']);
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->enum('posted', ['yes', 'no'])->default('not')->change();
        });
    }
};
