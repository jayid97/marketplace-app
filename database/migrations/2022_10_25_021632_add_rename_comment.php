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
        //
        Schema::table('ratings', function(Blueprint $table) {
            $table->renameColumn('comment', 'buyer_comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ratings', function(Blueprint $table) {
            $table->renameColumn('buyer_comment', 'comment');
        });
    }
};
