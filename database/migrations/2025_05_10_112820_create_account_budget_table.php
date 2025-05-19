<?php

use App\Models\Budget;
use App\Models\Category;
use App\Models\Home;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Home::class);
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Home::class);
            $table->foreignIdFor(Category::class);
            $table->string('name');
            $table->enum('period', ['daily', 'weekly', 'fortnightly', 'monthly', 'quarterly', 'bi-annually', 'annually']);
            $table->integer('amount');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('current');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('budgets');
    }
};
