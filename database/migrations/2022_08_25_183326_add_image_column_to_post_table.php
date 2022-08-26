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
        if (Schema::hasTable('posts')) {
            Schema::table('posts', function (Blueprint $table) {
                Schema::whenTableDoesntHaveColumn('posts', 'image', function (Blueprint $table) {
                    $table->string('image')->nullable()->after('slug');
                });
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('posts')) {
            Schema::table('posts', function (Blueprint $table) {
                Schema::whenTableHasColumn('posts', 'image', function (Blueprint $table) {
                    $table->dropColumn('image');
                });
            });
        }
    }
};
