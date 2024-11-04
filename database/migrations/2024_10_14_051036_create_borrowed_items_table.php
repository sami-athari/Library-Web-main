
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrowed_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming this exists
            $table->foreignId('perpus_id')->constrained()->onDelete('cascade'); // Assuming this exists
            $table->integer('jumlah');
            $table->string('name'); // Add this line to store the user's name
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('borrowed_items');
    }
};
