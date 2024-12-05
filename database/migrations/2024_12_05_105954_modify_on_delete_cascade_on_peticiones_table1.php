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
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign(['peticione_id']);

            // Volver a crear la clave foránea sin ON DELETE CASCADE
            $table->foreign('peticione_id')
                ->references('id')
                ->on('peticiones'); // Sin 'onDelete' para eliminar el CASCADE
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('files', function (Blueprint $table) {
            //
        });
    }
};
