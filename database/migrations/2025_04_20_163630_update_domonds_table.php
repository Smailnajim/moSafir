<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDomondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domondes', function (Blueprint $table){
            $table->dropColumn('ofer_id');
            $table->foreignId('offer_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domondes', function (Blueprint $table){
            $table->dropColumn('offer_id');
            $table->foreignId('ofer_id')->constrained()->onDelete('cascade');
        });
    }
}
