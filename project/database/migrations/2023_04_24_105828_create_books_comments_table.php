<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_comment', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained('books', 'id')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('comment_id')->constrained('comments', 'id')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_comment');
    }
};
