<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('borrowed_items', function (Blueprint $table) {
            $table->date('return_date')->nullable(); // Adding return_date column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('borrowed_items', function (Blueprint $table) {
            $table->dropColumn('return_date'); // Dropping return_date column
        });
    }
};
