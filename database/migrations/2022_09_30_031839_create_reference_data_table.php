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
        Schema::create('reference_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount');
            $table->string('purchaseNum');
            $table->integer('item');
            $table->string('po_text');
            $table->string('tax_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reference_data');
    }
};
