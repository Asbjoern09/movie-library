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
        Schema::table('movies', function (Blueprint $table) {
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // If you ever need to rollback, you can define the down method.
        // In this case, dropping columns added in the up method.
        Schema::table('movies', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
