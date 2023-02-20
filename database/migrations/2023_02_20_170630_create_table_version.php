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
        Schema::create('version', function (Blueprint $table) {
            $table->id('version_id');
            $table->unsignedBigInteger('library_id');
            $table->foreign('library_id')->references('library_id')->on('library');
            $table->string('version_number');
            $table->string('description');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_version');
    }
};
