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
            $table->dropColumn('producers');
        });
    }

    public function down()
    {
        // If you ever need to rollback, you can define the down method.
        // In this case, you can re-add the column in the down method.
        Schema::table('table_name', function (Blueprint $table) {
            $table->string('column_name'); // Replace with the original column definition
        });
    }
};
